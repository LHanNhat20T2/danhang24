<?php

use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $total = 0;

        foreach (Cart::content() as $item) {
            $productPrice = $item->price;
            $total += $productPrice * $item->qty;
        }

        return $total; // Trả về một giá trị số thực
    }
}
// cart page
if (!function_exists('productTotal')) {
    function productTotal($rowId)
    {
        $total = 0;
        $product = Cart::get($rowId);
        $productPrice = $product->price;

        $total += $productPrice  * $product->qty;
        $formattedTotal = number_format($total, 0, ',', '.') . ' VNĐ';
        return $formattedTotal;
    }
}

if (!function_exists('grandCartTotal')) {
    function grandCartTotal()
    {
        $total = 0;
        $cartTotal = cartTotal();


        $total += $cartTotal;
        $formattedTotal = number_format($total, 0, ',', '.') . ' VNĐ';
        return $formattedTotal;
    }
}

if (!function_exists('generateInvoiceId')) {
    function generateInvoiceId()
    {
        $randomNumber = rand(1, 9999);
        $currentDateTime = now();

        $invoiceId = $randomNumber . $currentDateTime->format('dmy') . $currentDateTime->format('s');
        return $invoiceId;
    }
}
