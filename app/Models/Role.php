<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    protected $guard_name = 'web';

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name'
    ];

    public function role_has_permission()
    {
        return $this->hasMany(RoleHasPermission::class, 'role_id');
    }

    /**
     * @param string $name
     * @param string $guard
     * @return bool
     */
    public function isExistRole($name, $guard)
    {
        $isExistedRole = self::where(
            [
                ['name', '=', $name],
                ['guard_name', '=', $guard],
            ]
        )->first();

        return $isExistedRole ? true : false;
    }
}
