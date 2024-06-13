@extends('admin.layouts.master')
<style>
    a:not([href]):not([tabindex]) {
        color: #fff !important;
    }
</style>
@section('content')
    <section class="mt-8 section">
        <div class="section-header">
            <h1>Đơn đặt hàng</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Tất cả đơn đặt hàng</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                        Thêm mới
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

<!-- Modal -->
<div class="modal fade" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="order_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="order_status_form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label style="width: 100%" for="">Trạng thái thanh toán
                            <select name="payment_status" class="form-control" id="">
                                <option value="Chưa thanh toán">Chưa thanh toán</option>
                                <option value="Đã thanh toán">Đã
                                    thanh toán</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="" style="width: 100%">Trạng thái đặt hàng
                            <select name="order_status" class="form-control" id="">
                                <option value="Chờ duyệt">Chờ duyệt
                                </option>
                                <option value="Đã duyệt">Đã duyệt
                                </option>
                                <option value="Từ chối">Từ chối
                                </option>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            var orderId = '';
            $(document).on('click', '.order_status_btn', function() {
                let id = $(this).data('id');

                orderId = id;
                let paymentStatus = $('.payment_status option');
                let orderStatus = $('.order_status option');
                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.orders.status', ':id') }}'.replace(':id', id),
                    success: function(response) {
                        $('.order_status_form').find('select[name="payment_status"]').val(
                            response.payment_status);
                        // Đặt giá trị cho dropdown order_status
                        $('.order_status_form').find('select[name="order_status"]').val(response
                            .order_status);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
            $('.order_status_form').on('submit', function(e) {
                e.preventDefault();
                let formContent = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.orders.status-update', ':id') }}'.replace(':id', orderId),
                    data: formContent,
                    success: function(response) {
                        $('#order_modal').modal('hide');
                        $('#order-table').DataTable().draw();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                    }
                })
            })
        })
    </script>
@endpush
