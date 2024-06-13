<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    function getOrderStatus(string $id)
    {
        $order = Order::select(['order_status', 'payment_status'])->findOrFail($id);
        return response($order);
    }

    function orderStatusUpdate(Request $request, string $id)
    {
        $request->validate([
            'order_status' => ['required', 'in:Chờ duyệt,Đã duyệt,Từ chối'],
            'payment_status' => ['required', 'in:Chưa thanh toán,Đã thanh toán'],
        ]);

        $order = Order::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->payment_status = $request->payment_status;
        $order->save();

        if ($request->ajax()) {
            return response(['message' => 'Cập nhật thành công!']);
        } else {
            toastr()->success('Cập nhật thành công!');
        }
        return redirect()->route('admin.orders.index');
    }

    function destroy(string $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response(['status' => 'success', 'message' => 'Xóa thành công!']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Đã xảy ra lỗi!']);
        }
    }
}
