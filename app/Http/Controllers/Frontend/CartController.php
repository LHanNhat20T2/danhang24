<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Time;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CartController extends Controller
{
    //

    function index()
    {
        return view('frontend.pages.cart-view');
    }
    function addToCart(Request $request)
    {
        $product = Product::findOrFail(($request->product_id));
        if ($product->quantity < $request->quantity) {
            throw ValidationException::withMessages(['Số lượng không đủ!']);
        }
        try {
            $options = [
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug
                ]
            ];

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->price,
                'weight' => 0,
                'options' => $options
            ]);

            return response(['status' => 'success', 'message' => 'Thêm sản phẩm thành công'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Đã xảy ra lỗi!'], 500);
        }
    }

    function getCartProduct()
    {
        return view('frontend.layouts.ajax-files.sidebar-cart-item')->render();
    }

    function cartProductRemove($rowId)
    {
        try {
            Cart::remove($rowId);
            return response(['status' => 'success', 'message' => 'Xóa sản phẩm thành công'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Đã xảy ra lỗi!'], 500);
        }
    }

    function cartQtyUpdate(Request $request)
    {
        $cartItem = Cart::get($request->rowId);
        $product = Product::findOrFail($cartItem->id);
        if ($product->quantity < $request->qty) {
            return response(['status' => 'error', 'message' => 'Số lượng không đủ', 'qty' => $cartItem->qty]);
        }
        try {

            $cart = Cart::update($request->rowId, $request->qty);
            return response([
                'status' => 'success',
                'product_total' => productTotal($request->rowId),
                'qty' => $cart->qty,
                'cart_total' => cartTotal(),
            ], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Đã xảy ra lỗi!'], 500);
        }
    }

    function cartDestroy()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function reservation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:50'],
            'reservation_date' => ['required', 'date'],
            'guestCount' => ['required', 'numeric'],
            'note' => ['required']
        ]);
        $reservation = new Reservation();
        $reservation->table_id = $request->table_id;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->reservation_time = $request->reservation_time;
        // Lưu các trường dữ liệu khác nếu cần
        $reservation->save();


        return redirect()->route('checkout.index');
    }
}
