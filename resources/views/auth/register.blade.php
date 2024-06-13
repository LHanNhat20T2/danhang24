@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                    BREADCRUMB START
                                                                ==============================-->
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign up</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                    BREADCRUMB END
                                                                ==============================-->


    <!--=========================
                                                                    SIGN UP START
                                                                ==========================-->
    <section class="fp__signup" style="background: url(images/login_bg.jpg);">
        <div class="fp__signup_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container ">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="m-auto col-xxl-5 col-xl-6 col-md-9 col-lg-7">
                        <div class="fp__login_area">
                            <h2>Đăng ký</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Họ và tên</label>
                                            <input type="text" placeholder="Name" name="name"
                                                @error('name') is-invalid @enderror value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Email</label>
                                            <input type="email" placeholder="Email" id="email" name="email"
                                                :value="old('email')" @error('email') is-invalid @enderror>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Mật khẩu</label>
                                            <input type="password" id="password" placeholder="Mật khẩu" name="password"
                                                @error('passwod') is-invalid @enderror>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password" id="password_confirmation"
                                                placeholder="Nhập lại mật khẩu" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="or"><span>or</span></p>
                            <p class="create_account">Bạn đã có tài khoản! <a href="{{ route('login') }}">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
                                                                    SIGN UP END
                                                                ==========================-->
@endsection
