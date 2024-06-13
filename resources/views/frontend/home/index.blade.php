@extends('frontend.layouts.master')
@section('content')
    {{-- BANNER START
==============================--> --}}
    <section class="fp__banner">
        <div class="fp__banner-info">
            <p class="fp__banner-heading">SEAFOOD RESTAURANT</p>
            <p class="fp__banner-address">Khu Đảo Xanh, P. Hòa Cường Bắc, Q. Hải Châu, TP. Đà Nẵng</p>

        </div>
    </section>


    @include('frontend.components.menu-item')
    <!--==================== MENU ITEM END ==============================-->


    <!--============================= Contact  START ==============================-->

    <section class="fp_contact">
        <div class="container">
            <div class="fp__inner">
                <p class="fp__text">HOTLINE: 0914 510 745</p>
            </div>
        </div>
    </section>

    <!--=============================
                                                                                                                                                           TESTIMONIAL  END
                                                                                                                                                        ==============================-->
    <section class="fp__testimonial pt_95 xs_pt_66 mb_150 xs_mb_120">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
                    <div class="fp__section_heading mb_40">
                        <h4>CẢM NHẬN TỪ KHÁCH HÀNG</h4>
                        <h2>Lắng nghe từ những thực khách tuyệt vời của chúng tôi</h2>
                    </div>
                </div>
            </div>

            <div class="row testi_slider">
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_testimonial">
                        <div class="flex-wrap fp__testimonial_header d-flex align-items-center">
                            <div class="img">
                                <img src='images/avatar/avatar-01.jpg' alt="clients" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h4>Văn Thanh</h4>
                                <p>Đà Nẵng</p>
                            </div>
                        </div>
                        <div class="fp__single_testimonial_body">
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                                accusamus
                                praesentium quaerat
                                nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_testimonial">
                        <div class="flex-wrap fp__testimonial_header d-flex align-items-center">
                            <div class="img">
                                <img src={{ asset('images/avatar/avatar-01.jpg') }} alt="clients" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h4>Nguyễn Ba</h4>
                                <p>HCM</p>
                            </div>
                        </div>
                        <div class="fp__single_testimonial_body">
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                                accusamus
                                praesentium quaerat
                                nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_testimonial">
                        <div class="flex-wrap fp__testimonial_header d-flex align-items-center">
                            <div class="img">
                                <img src="{{ asset('images/avatar/avatar-01.jpg') }}" alt="clients"
                                    class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h4>Văn Đạt</h4>
                                <p>Đà Nẵng</p>
                            </div>
                        </div>
                        <div class="fp__single_testimonial_body">
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                                accusamus
                                praesentium quaerat
                                nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_testimonial">
                        <div class="flex-wrap fp__testimonial_header d-flex align-items-center">
                            <div class="img">
                                <img src="images/client_img_3.jpg" alt="clients" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h4>payel sarkar</h4>
                                <p>nyc usa</p>
                            </div>
                        </div>
                        <div class="fp__single_testimonial_body">
                            <p class="feedback">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut
                                accusamus
                                praesentium quaerat
                                nihil magnam a porro eaque numquam</p>
                            <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                            TESTIMONIAL END
                                                                                                                                                        ==============================-->
@endsection
