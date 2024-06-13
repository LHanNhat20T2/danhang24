<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddressCreateRequest;
use App\Http\Requests\Frontend\AddressUpdateRequest;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function index(): View
    {
        $userAddress = Address::get();
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('frontend.dashboard.index', compact('userAddress', 'orders'));
    }

    function createAddress(AddressCreateRequest $request)
    {
        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->address = $request->address;

        $address->save();
        toastr()->success('Thêm địa chỉ mới thành công');

        return redirect()->back();
    }

    function updateAddress(string $id, Request $request)
    {
        $address = Address::findOrFail($id);
        $address->user_id = auth()->user()->id;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->address = $request->address;

        $address->save();
        $notification = array(
            'message' => 'Cập nhật thành công !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function destroyAddress(string $id)
    {
        $address = Address::findOrFail($id);
        if ($address && $address->user_id === auth()->user()->id) {
            $address->delete();
        }
        return response(['status' => 'success', 'message' => 'Đã xóa thành công']);
    }
}
