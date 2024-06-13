<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;
    function updateProfile(ProfileUpdateRequest $request)
    {
        $userData = Auth::user();
        $userData->name = $request->name;
        $userData->phone = $request->phone;
        $userData->address = $request->address;
        $userData->save();
        // if ($user->save()) {
        //     toastr()->success('Cập nhật thành công');
        // } else {
        //     toastr()->error('Cập nhật không thành công');
        // }
        toastr()->success('Thành công');
        return redirect()->back();
    }

    function updateAvatar(Request $request)
    {

        $imagePath = $this->uploadImage($request, 'avatar');
        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();
        toastr()->success('Thành công');
        // Flash a success message to the session

        return redirect()->back();
    }
}
