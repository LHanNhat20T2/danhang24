@extends('frontend.layouts.master')

@section('content')
    <!--=============================BREADCRUMB START ==============================-->

    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Thanh toán</h1>
                    <ul>
                        <li><a href="index.html">trang chủ</a></li>
                        <li><a href="#">thanh táon</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================BREADCRUMB END  ==============================-->

    <!--============================ PAYMENT PAGE START ==============================-->
    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="fp__payment_area">
                        <div class="row">
                            <div class="col-lg-3 col-6 col-sm-4 col-md-3 wow fadeInUp" data-wow-duration="1s">
                                <a class="fp__single_payment payment-card" data-name="paypal" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="#">
                                    <img src="{{ asset('frontend/assets/images/pay_1.jpg') }}" alt="payment method"
                                        class="img-fluid w-100">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt_25 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>THÔNG TIN THANH TOÁN</h6>
                        <p>Giá sản phẩm:<span
                                style="color: var(--colorPrimary);">{{ number_format(cartTotal(), 0, ',', '.') }}
                                VNĐ</span></p>
                        <p class="total"><span>Tổng cộng:</span> <span>{{ number_format(cartTotal(), 0, ',', '.') }}
                                VNĐ</span></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--============================ PAYMENT PAGE END ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.payment-card').on('click', function(e) {
                e.preventDefault();

                let paymentGateway = $(this).data('name');

                console.log(paymentGateway); // Add this line to debug

                $.ajax({
                    method: 'POST',
                    url: '{{ route('make-payment') }}',
                    data: {
                        payment_gateway: paymentGateway,
                        _token: '{{ csrf_token() }}' // Include CSRF token if necessary
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                    },
                });
            });
        });
    </script>
@endpush
