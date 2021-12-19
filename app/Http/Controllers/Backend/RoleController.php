<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BaseController;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use App\Models\RoleHasPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends BaseController
{
    private $roleModel, $permissionModel, $roleHasPermissionModel;

    public function __construct()
    {
        parent::__construct();

        $this->roleModel = new Role();
        $this->permissionModel = new Permission();
        $this->roleHasPermissionModel = new RoleHasPermission();
    }

    public function index()
    {
        $permissionGroups = PermissionGroup::isAvailable()->with('permissions')->orderBy('name')->get();
        $data = $this->roleModel->orderBy('name')->get();
        return view('backend.role.index', compact('data','permissionGroups'));
    }

    public function showFormAdd()
    {
        $permissionGroups = PermissionGroup::isAvailable()->with('permissions')->orderBy('name')->get();

        return view('backend.role.add', compact('permissionGroups'));
    }

    public function postFormAdd(Request $request)
    {
        $this->__validate($request);

        $roleName = $request->input('name');
        if ($this->roleModel->isExistRole($roleName, 'web')){
            return redirect()->back()->withInput()->with(['status' => 'danger', 'flash_message' => 'Role is exist!']);
        }

        DB::transaction(function () use ($request, $roleName) {
            $role = Role::create([
                'name' => $roleName,
            ]);

            $permissions = $request->input('permissions');
            if (is_array($permissions) && count($permissions)){
                $role->syncPermissions($permissions);
            }
        });

        return redirect()->route('role.list')->with(['status' => 'success', 'flash_message' => 'Add success']);
    }

    public function showFormEdit($id)
    {
        $data = $this->roleModel->findOrFail($id);
        if ($data->name == 'Admin'){
            return redirect()->back()->with(['status' => 'danger', 'flash_message' => "You can't modify Admin role."]);
        }
        $permissionGroups = PermissionGroup::isAvailable()->with('permissions')->orderBy('name')->get();
        $permissionSelected = $this->roleHasPermissionModel->getPermissionIdByRoleId($id);

        return view('backend.role.edit', compact('data','permissionGroups', 'permissionSelected'));
    }

    public function postFormEdit(Request $request, $id)
    {
        $this->__validate($request);

        $roleName = $request->input('name');
        $role = Role::findOrFail($id);

        if ($role->name == 'backend'){
            return redirect()->back()->with(['status' => 'danger', 'flash_message' => "You can't modify backend role."]);
        }

        if ($role->name <> $roleName && $this->roleModel->isExistRole($roleName, 'web')){
            return redirect()->back()->withInput()->with(['status' => 'danger', 'flash_message' => 'Role is exist!']);
        }

        DB::transaction(function () use ($request, $role) {
            $role->name = $request->input('name');
            $role->save();

            $permissions = $request->input('permissions');
            if (is_array($permissions) && count($permissions)){
                $role->syncPermissions($permissions);
            }
        });

        return redirect()->route('role.list')->with(['status' => 'success', 'flash_message' => 'Update success']);
    }

    public function delete(Request $request)
    {
        $id = $request->post('item_id');

        $role = Role::with('role_has_permission')->findOrFail($id);

        //        remove Role from user
        $users = User::role($id)->get(); // Returns all users with the role = $id
        foreach ($users as $user){
            $user->removeRole($id);
        }
        //delete role has permissions
        $role->role_has_permission()->delete();
        //delete role
        $role->delete();

        return response()->json([
            'status' => 'success',
            'title' => 'Deleted',
            'message' => 'Delete success'
        ]);
    }

    public function __validate($request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    }
}
