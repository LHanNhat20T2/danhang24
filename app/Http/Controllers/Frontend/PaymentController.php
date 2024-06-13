<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderPaymentUpdateEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\OrderService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    function index()
    {
        $subTotal = cartTotal();
        return view('frontend.pages.payment', compact('subTotal'));
    }

    function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    function paymentCancel()
    {
        return view('frontend.pages.payment-cancel');
    }

    function makePayment(Request $request, OrderService $orderService)
    {
        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal']
        ]);

        if ($orderService->createOrder()) {
            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
                    break;

                default:
                    break;
            }
        }
    }

    public function payWithPaypal()
    {
        // Khởi tạo PayPal client
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));

        // Lấy access token
        $accessToken = $provider->getAccessToken();
        if (!$accessToken) {
            Log::error('Không thể lấy mã truy cập PayPal.');
            return back()->with('error', 'Không thể lấy mã truy cập PayPal.');
        }

        // Đảm bảo tổng giá trị đã được thiết lập
        $grand_total_vnd = session()->get('total');
        if (!$grand_total_vnd) {
            Log::error('Không tìm thấy tổng số tiền trong session.');
            return back()->with('error', 'Không tìm thấy tổng số tiền trong session.');
        }

        // Chuyển đổi từ VNĐ sang USD
        $exchange_rate = 23000; // Giả sử tỉ giá là 23,000 VNĐ = 1 USD
        $grand_total_usd = $grand_total_vnd / $exchange_rate;

        // Tạo đơn hàng PayPal
        $response = $provider->createOrder([
            'intent' => "CAPTURE",
            'application_context' => [
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'value' => number_format($grand_total_usd, 2, '.', ''),
                        'currency_code' => 'USD' // Đơn vị tiền tệ là USD
                    ]
                ]
            ]
        ]);

        // Kiểm tra lỗi trong phản hồi
        if (isset($response['id']) && $response['id'] != NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            // Ghi nhật ký phản hồi lỗi từ PayPal
            return redirect()->route('payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }




    function paypalSuccess(Request $request, OrderService $orderService)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        // Lấy access token
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $orderId = session()->get('order_id');

            $capture = $response['purchase_units'][0]['payments']['captures'][0];
            $paymentInfo = [
                'transaction_id' => $capture['id'],
                'status' => 'Đã thanh toán'
            ];

            OrderPaymentUpdateEvent::dispatch($orderId, $paymentInfo, 'PayPal');
            $orderService->clearSession();

            return redirect()->route('payment.success');
        } else {
            return redirect()->route('payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }



    function paypalCancel()
    {
        return redirect()->route('payment.cancel');
    }
}
