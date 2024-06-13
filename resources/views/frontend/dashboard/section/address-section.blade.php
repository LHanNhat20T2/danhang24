<div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
    <div class="fp_dashboard_body address_body">
        <h3>Địa chỉ của tôi<a class="dash_add_new_address"><i class="far fa-plus"></i> Thêm địa
                chỉ mới
            </a>
        </h3>
        <div class="fp_dashboard_address">
            <div class="fp_dashboard_existing_address">
                <div class="row">
                    @foreach ($userAddress as $address)
                        <div class="col-md-6">
                            <div class="fp__checkout_single_address">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <span class="icon"><i class="fas fa-home"></i>
                                            Địa chỉ</span>
                                        <div class="form-check-row">
                                            <span class="address form-check-row-1">{{ $address->name }}</span>
                                            <span class="address">{{ $address->phone }}</span>
                                        </div>
                                        <span class="address">{{ $address->address }}</span>
                                    </label>
                                </div>
                                <ul>
                                    <li><a class="dash_edit_btn show_edit_section"
                                            data-class="edit_section_{{ $address->id }}"><i
                                                class="far fa-edit"></i></a></li>
                                    <li><a href="{{ route('address.destroy', $address->id) }}"
                                            class="dash_del_icon delete-item"><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="fp_dashboard_new_address ">
                <form action="{{ route('address.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4>Thêm địa chỉ mới</h4>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Họ và tên" name="name">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" placeholder="Số điện thoại" name="phone">
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <textarea cols="3" rows="4" placeholder="Địa chỉ" name="address"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="common_btn cancel_new_address"
                                style="background: #ef6464;">Hủy</button>
                            <button type="submit" class="common_btn">Lưu thay
                                đổi</button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($userAddress as $address)
                <div class="fp_dashboard_edit_address edit_section_{{ $address->id }} ">
                    <form action="{{ route('address.update', $address->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <h4>Sửa địa chỉ</h4>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" placeholder="Họ và tên" name="name"
                                        value="{{ $address->name }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" placeholder="Số điện thoại" name="phone"
                                        value="{{ $address->phone }}">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                    <textarea type="text" cols="3" rows="4" name="address" placeholder="Địa chỉ">{!! $address->address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="common_btn cancel_edit_address">Hủy</button>
                                <button type="submit" class="common_btn">Lưu thay
                                    đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
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
        })
    </script>
@endpush
