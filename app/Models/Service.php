<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'content', 'short_description', 'status', 'parent_id', 'slug'];
    protected $primaryKey = 'id';

    public function serviceChildrent()
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    public function saveService($model, $request)
    {
        $name = $request->input('name');
        $slug = simple_slug($name);

        $model->name = $request->input('name');
        $model->slug = $slug;
        $model->short_description = $request->input('short_description');
        $model->content = $request->input('content');
        $model->parent_id = $request->input('parent_id');
        $model->status = 1;
        
        $model->save();

        return $model;
    }
}
