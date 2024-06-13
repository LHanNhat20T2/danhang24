<div class="tab-pane fade show active" id="paypal-setting" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <div class="border card-body">
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="">Trạng thái Paypal</label>
                    <select name="paypal_status" id="" class="select2 form-control">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Chưa kích hoạt</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Chế độ tài khoản Paypal</label>
                    <select name="paypal_account_mode" id="" class="select2 form-control">
                        <option value="sandbox">Sandbox</option>
                        <option value="live">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Paypal Country Name</label>
                    <select name="paypal_country" id="" class="select2 form-control">
                        <option value="VND">VND</option>
                        <option value="USD">USD</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Paypal Client Id</label>
                    <input name="paypal_api_key" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Paypal Secret Key</label>
                    <input name="paypal_secret_key" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Paypal Id/label>
                        <input name="paypal_app_id" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Paypal Logo</label>
                    <div id="image-preview" class="image-preview paypal-preview">
                        <label for="image-upload" id="image-label">Chọn tệp</label>
                        <input type="file" name="paypal_logo" id="image-upload" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.paypal-preview').css({
                'background-image': 'url({{ @$paymentGateway['paypal_logo'] }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
