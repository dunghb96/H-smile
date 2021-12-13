<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->userModel = new User();
    }

    public function accountsettings()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate();
        return view('backend.user.accountsettings', compact('data'));
    }

   
}
