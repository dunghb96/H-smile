<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $guarded = [];

    public function saveBlog($model, $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            if($image != '') {
                $newFileName = uniqid() . '-' . $image;
                $path = $request->image->storeAs('public/uploads/blogs', $newFileName);
                $model->image = str_replace('public', '', $path);
                $request->file('image')->move('uploads/blogs', $newFileName);
            }
        }
        $model->title = $request->input('title');
        $model->category = $request->input('category');
        $model->short_desc = $request->input('short_desc');
        $model->content = $request->input('content');
        $model->author = Auth::user()->id;
        $model->status = 1;
        $model->save();

        return $model;
    }
}
