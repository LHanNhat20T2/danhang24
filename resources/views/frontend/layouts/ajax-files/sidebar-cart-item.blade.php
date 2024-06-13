<input type="hidden" value="{{ cartTotal() }}" id="cart_total">
<input type="hidden" value="{{ count(Cart::content()) }}" id="cart_product_count">
@foreach (Cart::content() as $cartProduct)
    <li>
        <div class="menu_cart_img">
            <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
        </div>
        <div class="menu_cart_text">
            <a class="title" href="#">{!! $cartProduct->name !!}</a>
            <p class="price ">X{{ $cartProduct->qty }}</p>
            <p class="price">{{ number_format($cartProduct->price, 0, ',', '.') }} VNĐ</p>
        </div>
        <span class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i
                class="fal fa-times"></i></span>
    </li>
@endforeach
