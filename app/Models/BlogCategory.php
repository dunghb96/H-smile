<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $fillable = ['name', 'slug'];

    public function saveBlogCate($model, $request)
    {
        $name = $request->input('name');
        $slug = simple_slug($name);

        $model->name = $request->input('name');
        $model->slug = $slug;
        $model->status = 1;
        
        $model->save();

        return $model;
    }
}
