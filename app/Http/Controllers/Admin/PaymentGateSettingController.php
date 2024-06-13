<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentGateSettingController extends Controller
{
    function index()
    {
        return view('admin.payment-setting.index');
    }
}
