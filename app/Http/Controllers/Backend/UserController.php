<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Traits\HasRoles;


class UserController extends BaseController
{
    use HasRoles;
    public function __construct()
    {
        parent::__construct();

        $this->userModel = new User();
    }

    public function accountsettings()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate();
        $userId = Auth::user()->id;
        $dataUser = User::find($userId);
        return view('backend.user.accountsettings', compact('data', 'userId', 'dataUser'));
    }


    public function edit(Request $request)
    {

        $model = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar->getClientOriginalName();
            if ($avatar != '') {
                $newFileName = uniqid() . '-' . $avatar;
                $path = $request->avatar->storeAs('public/uploads/user/image', $newFileName);
                $model->avatar = str_replace('public', '', $path);
                $request->file('avatar')->move('uploads/user/image', $newFileName);
            }
        }

        $model->name = $request->input('name');
        $model->phoneNumber = $request->input('phoneNumber');
        $model->date = $request->input('date');
        $model->identityCard = $request->input('identityCard');
        $model->address = $request->input('address');
        $model->description = $request->input('description');

        $model->save();
        if ($model) {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Cập nhật dữ liệu thành công';
        } else {
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Cập nhật dữ liệu không thành công';
        }
        echo json_encode($jsonObj);
    }


    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->input('old-password'), Auth::user()->password))) {
            // The passwords matches
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Mật khẩu hiện tại của bạn không khớp với mật khẩu..';

        } elseif (strcmp($request->get('old-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Mật khẩu mới không được giống với mật khẩu hiện tại của bạn.';
        } else if (strcmp($request->get('new-password'), $request->get('re-new-password')) !== 0) {
            // Current password and new password same
            $jsonObj['success'] = false;
            $jsonObj['msg'] = 'Xác nhận mật khẩu mới không giống nhau. Thử lại';
        } else {
            $jsonObj['success'] = true;
            $jsonObj['msg'] = 'Đổi mật khẩu thành công. Sẽ đăng xuất sau 1 giây';
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->input('new-password'));
            $user->save();
        }

        echo json_encode($jsonObj);


    }


    public function changePassword2(Request $request)
    {
//        $user = User::find(Auth::user()->id);
//        $model->password = $request->input('password');
        if (!(Hash::check($request->input('old-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Mật khẩu hiện tại của bạn không khớp với mật khẩu.");
        }

        if (strcmp($request->get('old-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "Mật khẩu mới không được giống với mật khẩu hiện tại của bạn.");
        }

        if (strcmp($request->get('new-password'), $request->get('re-new-password')) !== 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "Xác nhận mật khẩu mới không giống nhau. Thử lại");
        }


//        $validatedData = $request->validate([
//            'current-password' => 'required',
//            'new-password' => 'required|string|min:8|confirmed',
//        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Thành Công");

    }

    function thayanh(Request $request)
    {
        $model = User::find(Auth::user()->id);
        if ($request->hasFile('hinhanh')) {
            $hinhanh = $request->hinhanh->getClientOriginalName();
            if($hinhanh != '') {
                $newFileName = uniqid() . '-' . $hinhanh;
                $path = $request->hinhanh->storeAs('public/uploads/user', $newFileName);
                $hinhanh = str_replace('public', '', $path);
                $request->file('hinhanh')->move('uploads/user', $newFileName);
            }
        }
        $model->avatar = $hinhanh;
        $result = $model->save();
        if ($result) {
            Auth::user()->avatar = $hinhanh;
            $jsonObj['filename'] = $hinhanh;
            $jsonObj['success'] = true;
        } else {
            $jsonObj['msg'] = "Lỗi khi cập nhật database";
            $jsonObj['success'] = false;
        }
        echo json_encode($jsonObj);
    }

    function xoaanh()
    {
        $model = User::find(Auth::user()->id);
        $model->avatar = '/images/avatar-s-11.jpg';
        $result = $model->save();
        if ($result) {
            Auth::user()->avatar = '/images/avatar-s-11.jpg';
            $jsonObj['success'] = true;
        } else {
            $jsonObj['success'] = false;
        }
        echo json_encode($jsonObj);
    }

}
