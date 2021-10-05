<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name', 'title', 'permission_group_id'
    ];

    public function permission_group()
    {
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id')->withDefault();
    }

    public function role_has_permission()
    {
        return $this->hasMany(RoleHasPermission::class, 'permission_id');
    }

    /**
     * @param string $name
     * @param string $guard
     * @return bool
     */
    public function isExistPermission($name, $guard)
    {
        $isExistedPermission = self::where(
            [
                ['name', '=', $name],
                ['guard_name', '=', $guard],
            ]
        )->first();

        return $isExistedPermission ? true : false;
    }
}
