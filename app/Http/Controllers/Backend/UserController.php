<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\User\UserAddRequest;
use App\Http\Requests\User\UserEditProfileRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        parent::__construct();

        $this->userModel = new User();
    }

    public function getList()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate();

        return view('backend.user.list', compact('data'));
    }

    public function getAdd()
    {
        $roles  = Role::orderBy('name')->get();

        return view('backend.user.add', compact( 'roles'));
    }

    public function postAdd(UserAddRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = new User;

            //Insert data
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->status = $request->boolean('status', true);
            $user->save();

            $user->assignRole($request->input('role'));
        });

        return redirect()->route('user.list')->with(['status' => 'success', 'flash_message' => trans('label.notification.add_success')]);
    }

    public function getEdit($id = 0)
    {
        $data = User::findOrFail($id);

        if($data->id == Auth::id()){
            return redirect()->back()->with(['status' => 'danger', 'flash_message' => "You could not edit yourself!"]);
        }

        $roles  = Role::orderBy('name')->get();
        $rolesOfUser = $data->getRoleNames()->toArray();

        return view('backend.user.edit', compact('data', 'roles', 'rolesOfUser'));
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->__validateUserEditRequest($user, $request);

        if($id == Auth::id()){
            return redirect()->back()->with(['status' => 'danger', 'flash_message' => "You could not edit yourself!"]);
        }

        //Update data
        if (!empty($request->input('password'))){
            $user->password = bcrypt($request->input('password'));
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status');
        $user->save();

        $user->syncRoles($request->input('role'));

        return redirect()->route('user.list')->with(['status' => 'success', 'flash_message' => trans('label.notification.update_success')]);
    }

    public function changeStatus(Request $request)
    {
        $this->validate($request, [
            'field' => 'required|in:status',
            'item_id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $field = $request->post('field');
        $itemId = $request->post('item_id');
        $status = $request->post('status');

        if (in_array($status, [0,1])){
            $model = $this->userModel->findOrFail($itemId);
            $model->{$field} = $status;
            $model->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Update success'
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Status is invalid.'
        ]);
    }

    //Edit profile
    public function getEditProfile()
    {
        $dataUser = Auth::user();

        return view('backend.user.editProfile', compact('dataUser'));
    }

    public function postEditProfile(UserEditProfileRequest $request)
    {
        $user = Auth::user();
        $oldPassword = $request->input('old_password');
        //check password
        if (Hash::check($oldPassword, $user->password)) {
            $this->__validateUserEditRequest($user, $request);

            //Update data
            if (!empty($request->input('password'))){
                $user->password = bcrypt($request->input('password'));
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            return redirect()->back()->with(['status' => 'success', 'flash_message' => 'Update success']);
        } else {
            return redirect()->back()->with(['status' => 'danger', 'flash_message' => 'Old password incorrect']);
        }
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->post('item_id'));
        if($user->id == Auth::id()){
            return response()->json([
                'status' => 'error',
                'title' => trans('label.error'),
                'message' => 'You could not delete yourself!'
            ]);
        }
        if ($user->delete()){
            return response()->json([
                'status' => 'success',
                'title' => trans('label.deleted'),
                'message' => trans('label.notification.delete_success')
            ]);
        }

        return response()->json([
            'status' => 'error',
            'title' => trans('label.error'),
            'message' => trans('label.something_went_wrong')
        ]);

    }

    private function __validateUserEditRequest($user, $request)
    {
        if ($request->input('email') <> $user->email){
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
            ]);
        }

        if (!empty($request->input('password')) || !empty($request->input('password_confirmation'))){
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required',
            ]);
        }
    }
}
