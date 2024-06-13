@extends('admin.layouts.master')
<style>
    a:not([href]):not([tabindex]) {
        color: #fff !important;
    }
</style>
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chi tiết đơn hàng</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Trang chủ</a></div>
                <div class="breadcrumb-item">Chi tiết đơn hàng</div>
            </div>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Chi tiết đơn hàng</h2>
                                <div class="invoice-number">Mã đơn: {{ $order->invoice_id }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Name: </strong>{!! $order->userAddress->name !!}
                                        <br>
                                        <strong>Phone: </strong>{!! $order->userAddress->phone !!}
                                        <br>
                                        <strong>Địa chỉ: </strong>{!! $order->userAddress->address !!}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Ngày đặt:</strong>
                                        <br>
                                        {!! date('d/m/Y | H:i', strtotime($order->created_at)) !!}
                                        <br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <div style="margin-bottom: 10px">
                                            <strong style="mb-5">Phương thức thanh toán: </strong>
                                            <trong>{{ $order->payment_method }}</trong>
                                        </div>
                                        <strong>Trạng thái thanh toán:</strong>
                                        @if (strcasecmp($order->payment_status, 'Đã thanh toán') === 0)
                                            <span class="badge badge-success">Đã thanh toán</span>
                                        @else
                                            <span class="badge badge-warning">Chưa thanh toán</span>
                                        @endif
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Trạng thái đặt hàng:</strong>
                                        <br>
                                        @if (strcasecmp($order->order_status, 'Đã duyệt') === 0)
                                            <span class="badge badge-success">Đã duyệt</span>
                                        @elseif (strcasecmp($order->order_status, 'Chờ duyệt') === 0)
                                            <span class="badge badge-warning">Chờ duyệt</span>
                                        @else
                                            <span class="badge badge-danger">Từ chối</span>
                                        @endif
                                        <br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 row">
                        <div class="col-md-12">
                            <div class="section-title">Tất cả sản phẩm</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-right">Tổng cộng</th>
                                    </tr>
                                    @foreach ($order->orderDetails as $orderItem)
                                        @php
                                            $qty = $orderItem->qty;
                                            $unitPrice = $orderItem->unit_price;

                                            $productTotal = $unitPrice * $qty;
                                        @endphp
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ $orderItem->product_name }}</td>
                                            <td class="text-center">{{ number_format($unitPrice, 0, ',', '.') }} VNĐ</td>
                                            <td class="text-center">{{ $orderItem->qty }}</td>
                                            <td class="text-right">{{ number_format($productTotal, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="mt-4 row">
                                <div class="col-lg-8">
                                    <div class="col-md-4">
                                        <form action="{{ route('admin.orders.status-update', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Trạng thái thanh toán
                                                    <select style="width:300px" name="payment_status" class="form-control"
                                                        id="">
                                                        <option @selected(strcasecmp($order->payment_status, 'Chờ duyệt') === 0) value="Chờ duyệt">Chờ duyệt
                                                        </option>
                                                        <option @selected(strcasecmp($order->payment_status, 'Đã thanh toán') === 0) value="Đã thanh toán">Đã thanh
                                                            toán</option>
                                                    </select>
                                                    </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Trạng thái đặt hàng
                                                    <select style="width:300px" name="order_status" class="form-control"
                                                        id="">
                                                        <option style="padding: 50px" @selected(strcasecmp($order->order_status, 'Chờ duyệt') === 0)
                                                            value="Chờ duyệt">Chờ duyệt
                                                        </option>
                                                        <option @selected(strcasecmp($order->order_status, 'Đã duyệt') === 0) value="Đã duyệt">Đã duyệt
                                                        </option>
                                                        <option @selected(strcasecmp($order->order_status, 'Từ chối') === 0) value="Từ chối">Từ chối
                                                        </option>
                                                    </select>
                                            </div>
                                            <button type="submit" class="btn btn-info">Câp nhật</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-right col-lg-4">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Phí vận chuyển</div>
                                        <div class="invoice-detail-value">Miễn phí</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Tổng cộng</div>
                                        <div class="invoice-detail-value">{{ number_format($order->total, 0, ',', '.') }}
                                            VNĐ
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>
                        In</button>
                </div>
            </div>
        </div>
    </section>
@endsection
