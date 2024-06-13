@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ==============================-->
    <section class="fp__breadcrumb">
        <div class="fp_breadcrumb-head">
            <div class="container">
                <div class="fp__breadcrumb_text row">
                    <h2>Giỏ hàng</h2>
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="#">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=================== cart view============== !-->
    <section class="fp__cart_view mt_50 xs_mt_95 mb_50 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="fp__pro_img">
                                            Hình ảnh
                                        </th>

                                        <th class="fp__pro_name">
                                            Sản phẩm
                                        </th>

                                        <th class="fp__pro_status">
                                            Giá
                                        </th>

                                        <th class="fp__pro_select">
                                            Số lượng
                                        </th>

                                        <th class="fp__pro_tk">
                                            Tổng cộng
                                        </th>

                                        <th class="fp__pro_icon">
                                            <a class="clear_all" href="{{ route('cart.destroy') }}">Xóa tất cả</a>
                                        </th>
                                    </tr>
                                    @foreach (Cart::content() as $product)
                                        <tr>
                                            <td class="fp__pro_img"><img
                                                    src="{{ asset($product->options->product_info['image']) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="fp__pro_name">
                                                <a href="#!">{{ $product->name }}</a>
                                            </td>

                                            <td class="fp__pro_status">
                                                <h6 style="color: var(--colorPrimary)">
                                                    {{ number_format($product->price, 0, ',', '.') }} VNĐ</h6>
                                            </td>
                                            <td class="fp__pro_select">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger decrement"><i
                                                            class="fal fa-minus"></i></button>
                                                    <input type="text" class="quantity" data-id="{{ $product->rowId }}"
                                                        placeholder="1" value="{{ $product->qty }}" readonly>
                                                    <button class="btn btn-success increment"><i
                                                            class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="fp__pro_tk">
                                                <h6 class="product_cart_total">{{ productTotal($product->rowId) }}</h6>
                                            </td>

                                            <td class="fp__pro_icon">
                                                <a href="#" class="remove_cart_product"
                                                    data-id="{{ $product->rowId }}"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>Thông tin thanh toán</h6>
                        <p>Giá sản phẩm:
                            <span id="subtotal"
                                style="color: var(--colorPrimary); font-weight: 400">{{ number_format(cartTotal(), 0, ',', '.') }}
                                VNĐ</span>
                        </p>
                        {{-- <a class="common_btn" href="{{ route('checkout.index') }}">Thanh toán ngay</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================CART VIEW END==============================-->
    @php
        $reservationTimes = \App\Models\Time::get();
    @endphp
    <!-- ======= reservation ===== -->
    <section class="fp__reservation mt_50 xs_mt_95 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="reservation__inner">
                    <div class="col-lg-8 offset-lg-2 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__reservation_form">
                            <h3 class="text-center ">Thông tin đặt bàn</h3>
                            <form id="reservationForm" method="POST" action="{{ route('reservation.store') }}">
                                @csrf
                                <div class="row">
                                    <div class=" form-group col-md-4">
                                        <label for="name" class="mb-2 text-center">Họ tên</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="mb-2 form-group col-md-4">
                                        <label class="mb-2" for="reservation_date">Ngày</label>
                                        <input type="date" class="form-control" id="reservation_date"
                                            name="reservation_date" min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="mb-2 form-group col-md-4">
                                        <label class="mb-2" for="guestCount">Số khách</label>
                                        <input type="number" class="form-control" id="guestCount" min="1"
                                            name="guestCount">
                                    </div>
                                    <div class="mb-2 form-group col-md-6">
                                        <label class="mb-2" for="phone">Số điện thoại</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2">Khung giờ</label>
                                        <select name="reservation_time" class="form-control select2" id="">
                                            @foreach ($reservationTimes as $time)
                                                <option value="">{{ $time->timeSlot }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="note">Ghi chú</label>
                                        <textarea class="form-control" id="note" name="note"></textarea>
                                    </div>
                                    <div class="reservationForm-btn">
                                        <button type="submit" class="btn">Đặt bàn</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= reservation ===== -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.increment').on('click', function() {
                let inputField = $(this).siblings('.quantity');
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data('id');
                inputField.val(currentValue + 1);

                cartQtyUpdate(rowId, inputField.val(), function(response) {
                    console.log(response); // Debugging: log the response
                    if (response.status === 'success') {
                        inputField.val(response.qty);
                        let productTotal = response.product_total;
                        console.log('Updating product total to:',
                            productTotal); // Debugging: log the product total
                        inputField.closest('tr').find('.product_cart_total').text(productTotal);

                        cartTotal = response.cart_total;
                        let formattedTotalPrice = cartTotal.toString().replace(
                            /\B(?=(\d{3})+(?!\d))/g, '.') + 'VNĐ';

                        $('#subtotal').text(formattedTotalPrice);

                    } else if (response.status === 'error') {
                        inputField.val(response.qty);
                        toastr.error(response.message);
                    }
                });
            });

            $('.decrement').on('click', function() {
                let inputField = $(this).siblings('.quantity');
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data('id');

                inputField.val(currentValue - 1);

                if (currentValue > 1) {
                    cartQtyUpdate(rowId, inputField.val(), function(response) {
                        if (response.status === 'success') {
                            inputField.val(response.qty);
                            let productTotal = response.product_total;
                            inputField.closest('tr').find('.product_cart_total').text(productTotal);
                            cartTotal = response.cart_total;

                            let formattedTotalPrice = cartTotal.toString().replace(
                                /\B(?=(\d{3})+(?!\d))/g, '.') + 'VNĐ';
                            $('#subtotal').text(formattedTotalPrice);

                        } else if (response.status === 'error') {
                            inputField.val(response.qty);
                            toastr.error(response.message);
                        }
                    });
                }
            });

            function cartQtyUpdate(rowId, qty, callback) {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('cart.quantity-update') }}',
                    data: {
                        'rowId': rowId,
                        'qty': qty
                    },
                    success: function(response) {
                        if (callback && typeof callback === 'function') {
                            callback(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    }
                });
            }

            $('.remove_cart_product').on('click', function(e) {
                e.preventDefault();
                let rowId = $(this).data('id');
                removeCartProduct(rowId);
                $(this).closest('tr').remove();
            });

            function removeCartProduct(rowId) {
                $.ajax({
                    method: 'GET',
                    url: '{{ route('cart-product-remove', ':rowId') }}'.replace(':rowId', rowId),
                    success: function(response) {
                        if (response.status === 'success') {
                            updateSidebarCart();
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    }
                });
            }

            $('#reservationForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: '{{ route('reservation.store') }}',
                    data: formData,
                    success: function(response) {
                        toastr.success('thanh cong')
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value)
                        })
                    }
                });
            });
        });
    </script>
@endpush
