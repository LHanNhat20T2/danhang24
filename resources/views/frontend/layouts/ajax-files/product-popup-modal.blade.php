<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
<form action="" id="modal_add_to_cart_form">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    @csrf
    <div class="fp__cart_popup_img">
        <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
        <a href="#" class="title">{!! $product->name !!}</a>
        <p class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
            <span>(201)</span>
        </p>
        <input type="text" class="quantity_input" name="base_price"
            value="{{ number_format($product->price, 0, ',', '.') }} VNĐ">

        <div class="details_quentity">
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn btn-danger decrement"><i class="fal fa-minus"></i></button>
                    <input type="text" name="quantity" placeholder="1" id="quantity" value="1" readonly>
                    <button class="btn btn-success increment"><i class="fal fa-plus"></i></button>
                </div>
                <h3 id="total_price">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h3>
            </div>
        </div>
        <ul class="flex-wrap details_button_area d-flex">
            @if ($product->quantity === 0)
                <li><button class="common_btn bg-danger" href="#">Đã hết</button></li>
            @else
                <li><button class="common_btn modal_cart_button" href="#">Thêm giỏ hàng</button></li>
            @endif
        </ul>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.increment').on('click', function(e) {
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            quantity.val(currentQuantity + 1);
            updateTotalPrice()
        })

        $('.decrement').on('click', function(e) {
            e.preventDefault();
            let quantity = $('#quantity');
            let currentQuantity = parseFloat(quantity.val());
            if (currentQuantity > 1) {
                quantity.val(currentQuantity - 1);
                updateTotalPrice()
            }
        })

        function updateTotalPrice() {
            let basePrice = parseFloat($('input[name="base_price"]').val().replace(/[^\d]/g, ''));
            let quantity = parseFloat($('#quantity').val());

            let totalPrice = basePrice * quantity;
            let formattedTotalPrice = totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') +
                'VNĐ';
            $('#total_price').text(formattedTotalPrice);
        }
        // add to cart
        $('#modal_add_to_cart_form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'POST',
                url: '{{ route('add-to-cart') }}',
                data: formData,
                success: function(response) {
                    updateSidebarCart();
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage)
                }
            });
        });


    })
</script>
