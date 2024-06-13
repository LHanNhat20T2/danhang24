@extends('frontend.layouts.master')
@section('content')
    <!--=============================
                                BREADCRUMB START
                            ==============================-->
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign in</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                BREADCRUMB END
                            ==============================-->


    <!--=========================
                                SIGNIN START
                            ==========================-->
    <section class="fp__signin" style="background: url(images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="m-auto col-xxl-5 col-xl-6 col-md-9 col-lg-7">
                        <div class="fp__login_area">
                            <h2 class="fp__login-heading">Đăng nhập</h2>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <x-input-label for="email" class="mb-2">Email</x-input-label>
                                            <x-text-input id="email" class="form-control" placeholder="Nhập email"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username" />
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <x-input-label for="password" class="mb-2">Password</x-input-label>
                                            <div class="form-group">
                                                <x-text-input id="password" class="form-control" type="password"
                                                    placeholder="Nhập pasword" name="password" required
                                                    autocomplete="current-password" />
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="fp__login_imput fp__login_check_area">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" name="remember">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Remeber Me
                                                    </label>

                                                </div>
                                                <a href={{ route('password.request') }}>Forgot Password ?</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="fp__login_imput">
                                                <button type="submit" class="common_btn">login</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create
                                    Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
                                SIGNIN END
                            ==========================-->
@endsection
