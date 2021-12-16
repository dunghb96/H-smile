<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $guarded = [];

    public function saveFeedback($model, $request)
    {

        $model->name = $request->input('name');
        $model->address = $request->input('address');
        $model->message = $request->input('content');
        $model->status = 1;

        $model->save();

        return $model;
    }
}
