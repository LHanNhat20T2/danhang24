<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Log;

class OrderService
{
    function createOrder()
    {
        try {
            Log::info('Starting order creation');

            $order = new Order();
            $order->invoice_id = generateInvoiceId();
            $order->user_id = auth()->user()->id;
            $order->address = session()->get('address');
            $order->total = cartTotal();
            $order->product_qty = Cart::content()->count();
            $order->payment_method = NULL;
            $order->payment_status = 'Chưa thanh toán';
            $order->payment_approve_date = NULL;
            $order->transaction_id = NULL;
            $order->note = NULL;
            $order->order_status = 'Chờ duyệt';
            $order->address_id = session()->get('address_id');
            $order->save();

            Log::info('Order saved with ID: ' . $order->id);

            foreach (Cart::content() as $product) {
                $orderItem = new OrderDetail();
                $orderItem->order_id = $order->id;
                $orderItem->product_name = $product->name;
                $orderItem->product_id = $product->id;
                $orderItem->unit_price = $product->price;
                $orderItem->qty = $product->qty;
                $orderItem->save();

                Log::info('Order item saved: ' . $orderItem->id);
            }
            session()->put('order_id', $order->id);

            session()->put('total', $order->total);

            return true;
        } catch (\Exception $e) {
            Log::error('Error creating order: ' . $e->getMessage());
            return false;
        }
    }

    function clearSession()
    {
        Cart::destroy();
        session()->forget('address');
    }
}
