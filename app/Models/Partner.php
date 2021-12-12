<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partners';
    protected $guarded = [];

    public function savePartner($model, $request)
    {
        if ($request->hasFile('logo')) {
            $logo = $request->logo->getClientOriginalName();
            if($logo != '') {
                $newFileName = uniqid() . '-' . $logo;
                $path = $request->logo->storeAs('public/uploads/partner', $newFileName);
                $model->logo = str_replace('public', '', $path);
                $request->file('logo')->move('uploads/partner', $newFileName);
            }
        }
        $model->name = $request->input('name');
        $model->save();

        return $model;
    }
}
