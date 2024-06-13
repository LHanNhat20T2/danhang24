<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="fp_dashboard_body">
        <h3>Thông tin cá nhân</h3>

        <div class="fp__dsahboard_overview">
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="fp__dsahboard_overview_item">
                        <span class="icon"><i class="far fa-shopping-basket"></i></span>
                        <h4>Tổng đơn hàng<span>(76)</span></h4>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="fp__dsahboard_overview_item green">
                        <span class="icon"><i class="far fa-shopping-basket"></i></span>
                        <h4>Hoàn thành<span>(71)</span></h4>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="fp__dsahboard_overview_item red">
                        <span class="icon"><i class="far fa-shopping-basket"></i></span>
                        <h4>Hủy<span>(05)</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="fp_dash_personal_info">
            <h4>Thông tin
                <a class="dash_info_btn">
                    <span class="edit">Sửa</span>
                    <span class="cancel">Hủy</span>
                </a>
            </h4>

            <div class="personal_info_text">
                <p><span>Tên:</span>{{ auth()->user()->name }}</p>
                <p><span>Email:</span>{{ auth()->user()->email }}</p>
                <p><span>Số điện thoại:</span>{{ auth()->user()->phone }}</p>
                <p><span>Địa chỉ:</span>{{ auth()->user()->address }}</p>
            </div>

            <div class="p-0 fp_dash_personal_info_edit comment_input">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="fp__comment_imput_single">
                                <label>Tên</label>
                                <input type="text" placeholder="Name" value="{{ auth()->user()->name }}"
                                    name="name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="fp__comment_imput_single">
                                <label>Số điện thoại</label>
                                <input type="text" placeholder="Phone" name="phone"
                                    value="{{ auth()->user()->phone }}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="fp__comment_imput_single">
                                <label>Địa chỉ</label>
                                <textarea rows="4" placeholder="Address" name="address"> {{ auth()->user()->address }}</textarea>
                            </div>
                            <button type="submit" class="common_btn">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
