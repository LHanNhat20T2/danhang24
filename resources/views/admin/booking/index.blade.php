@extends('admin.layouts.master')
<style>
    a:not([href]):not([tabindex]) {
        color: #fff !important;
    }
</style>
@section('content')
    <section class="mt-8 section">
        <div class="section-header">
            <h1>Lịch đặt bàn</h1>
        </div>
        <button class="btn btn-primary">Tạo đơn đặt bàn</button>
        <div class="fp_booking">
            <div class="fp_booking-row">
                <div class=" fp_booking-item">
                    <div class="fp_booking-header">
                        <h3 class="fp_booking-header_name">Hàn Nhật - <span class="fp_booking-header_name">098989898</span>
                            <button class="btn btn-danger" style="margin-left: 220px">Hủy bàn</button>
                        </h3>
                    </div>
                    <div class="fp_booking-body">
                        <p>Bàn số 1</p>
                        <p>Khung giờ: 10 -12 giờ</p>
                        <p>Số tiền 800.000đ</p>
                        <div class="fp_booking-btn">
                            <button class="btn" style="background: var(--green)">Xếp bàn</button>
                            <button class="btn" style="background: var(--yellow)">Chọn món</button>
                            <button class="btn btn-primary" style="margin-left: 0">Khách nhận bàn</button>
                        </div>
                    </div>
                </div>

                <div class=" fp_booking-item">
                    <div class="fp_booking-header">
                        <h3 class="fp_booking-header_name">Hàn Nhật - <span class="fp_booking-header_name">098989898</span>
                            <button class="btn btn-danger" style="margin-left: 220px">Hủy bàn</button>
                        </h3>
                    </div>
                    <div class="fp_booking-body">
                        <p>Bàn số 1</p>
                        <p>Khung giờ: 10 -12 giờ</p>
                        <p>Số tiền 800.000đ</p>
                        <div class="fp_booking-btn">
                            <button class="btn" style="background: var(--green)">Xếp bàn</button>
                            <button class="btn" style="background: var(--yellow)">Chọn món</button>
                            <button class="btn btn-primary" style="margin-left: 0">Khách nhận bàn</button>
                        </div>
                    </div>
                </div>

                <div class=" fp_booking-item">
                    <div class="fp_booking-header">
                        <h3 class="fp_booking-header_name">Hàn Nhật - <span class="fp_booking-header_name">098989898</span>
                            <button class="btn btn-danger" style="margin-left: 220px">Hủy bàn</button>
                        </h3>
                    </div>
                    <div class="fp_booking-body">
                        <p>Bàn số 1</p>
                        <p>Khung giờ: 10 -12 giờ</p>
                        <p>Số tiền 800.000đ</p>
                        <div class="fp_booking-btn">
                            <button class="btn" style="background: var(--green)">Xếp bàn</button>
                            <button class="btn" style="background: var(--yellow)">Chọn món</button>
                            <button class="btn btn-primary" style="margin-left: 0">Khách nhận bàn</button>
                        </div>
                    </div>
                </div>

                <div class=" fp_booking-item">
                    <div class="fp_booking-header">
                        <h3 class="fp_booking-header_name">Hàn Nhật - <span class="fp_booking-header_name">098989898</span>
                            <button class="btn btn-danger" style="margin-left: 220px">Hủy bàn</button>
                        </h3>
                    </div>
                    <div class="fp_booking-body">
                        <p>Bàn số 1</p>
                        <p>Khung giờ: 10 -12 giờ</p>
                        <p>Số tiền 800.000đ</p>
                        <div class="fp_booking-btn">
                            <button class="btn" style="background: var(--green)">Xếp bàn</button>
                            <button class="btn" style="background: var(--yellow)">Chọn món</button>
                            <button class="btn btn-primary" style="margin-left: 0">Khách nhận bàn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
