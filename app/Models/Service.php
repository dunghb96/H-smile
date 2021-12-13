<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'content', 'short_description', 'status', 'parent_id', 'slug', 'price'];
    protected $primaryKey = 'id';

    public function serviceChildrent()
    {
        return $this->hasMany(Service::class, 'parent_id');
    }

    public function saveService($model, $request)
    {

        if ($request->hasFile('icon')) {
            $icon = $request->icon->getClientOriginalName();
            if($icon != '') {
                $newFileName = uniqid() . '-' . $icon;
                $path = $request->image->storeAs('public/uploads/service/icon', $newFileName);
                $model->icon = str_replace('public', '', $path);
                $request->file('icon')->move('uploads/service/icon', $newFileName);
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            if($image != '') {
                $newFileName = uniqid() . '-' . $image;
                $path = $request->image->storeAs('public/uploads/service/image', $newFileName);
                $model->image = str_replace('public', '', $path);
                $request->file('image')->move('uploads/service/image', $newFileName);
            }
        }

        $name = $request->input('name');
        $slug = simple_slug($name);
        $model->name = $request->input('name');
        $model->slug = $slug;
        $model->short_description = $request->input('short_description');
        $model->price = $request->input('price');
        $model->content = $request->input('content');
        $model->parent_id = $request->input('parent_id');
        $model->status = 1;

        $model->save();

        return $model;
    }
}
