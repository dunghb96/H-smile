<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
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
        return view('backend.user.accountsettings', compact('data'));
    }


}
