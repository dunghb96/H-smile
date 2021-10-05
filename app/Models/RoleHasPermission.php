<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission_id', 'role_id'
    ];

    public function getPermissionIdByRoleId($roleID)
    {
        $data = self::where('role_id', $roleID)->get()->toArray();

        return array_column($data, 'permission_id');
    }
}
