@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp_breadcrumb-head">
            <div class="container">
                <div class="fp__breadcrumb_text row">
                    <h2>Thanh toán</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li><a href="javascript:;">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                BREADCRUMB END
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->


    <!--============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                CHECK OUT PAGE START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>Thông tin đặt đơn </h5>
                            @foreach ($reservation as $item)
                                <div class="">
                                    <div class="fp__check_form-row">
                                        <h3 class="fp__check_form-text">Tên người đặt bàn:</h3>
                                        <span class="fp__check_form-span">{{ $item->name }}</span>
                                    </div>
                                    <div class="fp__check_form-row">
                                        <h3 class="fp__check_form-text">Điện thoại: </h3>
                                        <span class="fp__check_form-span">: {{ $item->phone }}</span>
                                    </div>
                                    <div class="fp__check_form-row">
                                        <h3 class="fp__check_form-text">Thời gian dùng bữa: </h3>
                                        <span class="fp__check_form-span">: {{ $item->reservation_date }}
                                            ({{ $item->reservation_time }})
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="fp__check_form" style="padding-right:75px">
                            <h5>Thực đơn đặt trước </h5>
                            <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s" style="width: 100%">
                                <div class="fp__cart_list">
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
                                                            <input type="text" class="quantity"
                                                                data-id="{{ $product->rowId }}" placeholder="1"
                                                                value="{{ $product->qty }}" readonly>

                                                        </div>
                                                    </td>

                                                    <td class="fp__pro_tk">
                                                        <h6 class="product_cart_total">
                                                            {{ productTotal($product->rowId) }}</h6>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="fp__cart_list_footer_button">
                        <h6>THÔNG TIN THANH TOÁN</h6>
                        <p>Giá sản phẩm:<span
                                style="color: var(--colorPrimary);">{{ number_format(cartTotal(), 0, ',', '.') }}
                                VNĐ</span></p>
                        <p class="total"><span>Tổng cộng:</span> <span
                                id="grand_total">{{ number_format(cartTotal(), 0, ',', '.') }}
                                VNĐ</span></p>
                        <form>
                            <button type="submit">Gửi</button>
                        </form>
                        <a class="common_btn" id="procced_pmt_button" href="">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--============================CHECK OUT PAGE END ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.v_address').prop('checked', false);

            $('.v_address').on('click', function() {
                let addressId = $(this).val();
                let grandTotal = $('#grand_total');

                $.ajax({
                    method: 'GET',
                    url: '{{ route('checkout.delivery-cal', ':id') }}'.replace(":id", addressId),
                    success: function(response) {
                        let grandTotalText = grandTotal
                            .text();
                        let formattedTotalPrice = grandTotalText.replace(
                            /\B(?=(\d{3})+(?!\d))/g, '.') + 'VNĐ';
                        $('#grand_total').text(
                            formattedTotalPrice);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.success(errorMessage);
                    },
                })
            })


            $('.show_edit_section').on('click', function() {
                let className = $(this).data('class');
                $('.fp_dashboard_edit_address').removeClass('d-block');
                $('.fp_dashboard_edit_address').removeClass('d-none');
                $('.fp_dashboard_existing_address').addClass('d-none');
                $('.' + className).addClass('d-block');
            })

            $('.cancel_edit_address').on('click', function() {
                $('.fp_dashboard_edit_address').addClass('d-none');
                $('.fp_dashboard_existing_address').removeClass('d-none');
            })

            $('#procced_pmt_button').on('click', function(e) {
                e.preventDefault();
                let address = $('.v_address:checked');

                $.ajax({
                    method: 'POST',
                    url: '{{ route('checkout.redirect') }}',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.success(errorMessage);
                    },
                })
            })
        })
    </script>
@endpush
