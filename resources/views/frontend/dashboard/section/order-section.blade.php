<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="fp_dashboard_body">
        <h3>Đơn đặt hàng</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="t_header">
                            <th>Đơn hàng</th>
                            <th>Ngày</th>
                            <th>Trạng thái TT</th>
                            <th>Trạng thái đơn</th>
                            <th>Thành tiền</th>
                            <th>Chi tiết</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <h5>#{{ $order->invoice_id }}</h5>
                                </td>
                                <td>
                                    <p>{{ date('d/m/Y', strtotime($order->created_at)) }}</p>
                                </td>
                                <td>
                                    @if (strcasecmp($order->payment_status, 'Đã thanh toán') === 0)
                                        <span class="badge badge-success "
                                            style="
                                        background: green; ">
                                            Đã thanh toán</span>
                                    @else
                                        <span class="badge badge-warning"
                                            style="
                                        background: red; ">Chưa
                                            thanh toán</span>
                                    @endif
                                </td>
                                <td>
                                    @if (strcasecmp($order->order_status, 'Đã duyệt') === 0)
                                        <span class="badge badge-success"
                                            style="
                                        background: green; ">Đã
                                            duyệt</span>
                                    @elseif (strcasecmp($order->order_status, 'Chờ duyệt') === 0)
                                        <span class="badge badge-warning"
                                            style="
                                        background: rgb(194, 194, 19); ">Chờ
                                            duyệt</span>
                                    @else
                                        <span class="badge badge-danger"
                                            style="
                                        background: red; ">Từ
                                            chối</span>
                                    @endif
                                </td>
                                <td>
                                    <h5>{{ number_format($order->total, 0, ',', '.') }} VNĐ</h5>
                                </td>
                                <td><a class="view_invoice">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach ($orders as $order)
            <div class="fp__invoice invoice_details_{{ $order->id }}">
                <a class="go_back d-print-none"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
                <div class="fp__invoice_header">
                    <div class="header_address">
                        <h4>Thông tin nhận hàng</h4>
                        <p>{{ @$order->userAddress->name }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ @$order->userAddress->phone }}</p>
                        <p>{{ @$order->userAddress->email }}</p>

                    </div>
                    <div class="header_address" style="width: 50%">
                        <p><b>Mã đơn:</b><span>#{{ @$order->invoice_id }}</span></p>
                        <p><b>Trạng thái thanh toán:
                            </b><span>{{ @$order->payment_status }}</span>
                        </p>
                        <p><b>Phương thức thanh toán:
                            </b><span>{{ @$order->payment_method }}</span></p>
                        <p><b>Mã giao dịch: </b><span>{{ @$order->transaction_id }}</span>
                        </p>

                        <p><b>date:</b>
                            <span>{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
                        </p>
                    </div>
                </div>
                <div class="fp__invoice_body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="border_none">
                                    <th class="sl_no">Số TT</th>
                                    <th class="package">Sản phẩm</th>
                                    <th class="price">Giá</th>
                                    <th class="qnty">Số lượng</th>
                                    <th class="total">Tổng cộng</th>
                                </tr>
                                @foreach ($order->orderDetails as $item)
                                    @php
                                        $qty = $item->qty;
                                        $unitPrice = $item->unit_price;

                                        $productTotal = $unitPrice * $qty;
                                    @endphp
                                    <tr>
                                        <td class="sl_no">{{ $loop->iteration }}</td>
                                        <td class="package">
                                            <p>{{ $item->product_name }}</p>
                                            <span class="size">{{ $item->size }}</span>
                                            <!-- Assuming $item->size exists, add the correct property if needed -->
                                        </td>
                                        <td class="price">
                                            <b>{{ number_format($item->unit_price, 0, ',', '.') }} VNĐ</b>
                                        </td>
                                        <td class="qnty">
                                            <b>{{ $item->qty }}</b>
                                        </td>
                                        <td class="total">
                                            <b>{{ number_format($productTotal, 0, ',', '.') }} VNĐ</b>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="package" colspan="3">
                                        <b>Tổng cộng</b>
                                    </td>
                                    <td class="qnty">
                                        <b></b>
                                    </td>
                                    <td class="total">
                                        <b>{{ number_format($order->total, 0, ',', '.') }} VNĐ </b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        function viewInvoice(id) {
            $(".fp_dashboard_order").fadeOut();
            $(".invoice_details_").fadeIn();
        }
    </script>
@endpush
