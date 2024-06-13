<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function index()
    {
        $reservation = Reservation::get();
        $name = session()->get('name');
        $phone = session()->get('phone');
        $time = session()->get('time');
        return view('frontend.pages.checkout', compact('name', 'phone', 'time', 'reservation'));
    }

    function CalculateDeliveryCharge(string $id)
    {
        try {

            $address = Address::findOrFail($id);
            $grandTotal = cartTotal();
            return response(['grand_total' => $grandTotal]);
        } catch (\Exception $e) {
            logger($e);
            return response(['message', 'Xảy ra lỗi'], 422);
        }
    }

    function checkoutRedirect(Request $request)
    {
        $name = "Hàn Nhật";
        $phone = "09898987872";
        $time = "12/02/2024 (8-10 giờ)";

        // Store data in session
        session()->put('name', $name);
        session()->put('phone', $phone);
        session()->put('time', $time);

        return response(['redirect_url' => route('payment.index')]);
    }
}
