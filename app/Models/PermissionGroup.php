<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug'
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'permission_group_id')->whereIn('name', $this->getAvailablePermissions());
    }

    public function saveGroup($model, $request)
    {
        $model->name = $request->input('name');
        $model->slug = simple_slug($model->name);
        $model->save();
    }

    public function scopeIsAvailable($query)
    {
        return $query->whereIn('slug', $this->getAvailablePermissionGroups());
    }

    private function getAvailablePermissionGroups()
    {
        $availableGroups = [];
        $dataPermissions = config('permission_data');
        if (is_array($dataPermissions) && !empty($dataPermissions)){
            $availableGroups = array_keys($dataPermissions);
        }

        return $availableGroups;
    }

    private function getAvailablePermissions()
    {
        $availablePermissions = [];
        $dataPermissions = config('permission_data');
        if (is_array($dataPermissions) && !empty($dataPermissions)){
            foreach ($dataPermissions as $keyGroupPermission => $groupPermission){
                $availablePermissions[] =  array_keys($groupPermission['permissions']);
            }
        }

        return array_unique(call_user_func_array('array_merge', $availablePermissions));
    }
}
