<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function saveSlide($model, $request)
    {
        if ($request->hasFile('image')) {
            $fname = $request->image->getClientOriginalName();
            if($fname != '') {
                $newFileName = uniqid() . '-' . $fname;
                $path = $request->image->storeAs('public/uploads/slide', $newFileName);
                $model->image = str_replace('public', '', $path);
                $request->file('image')->move('uploads/slide', $newFileName);
            }
        }
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->status = 1;
        
        $model->save();

        return $model;
    }
    
}
