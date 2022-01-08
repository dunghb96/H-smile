<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name', 'type', 'short_description', 'email', 'status', 'phone_number', 'position', 'majors', 'services'];

    public function users()
    {
        return $this->hasOne(User::class,'employee', 'id');
    }

    public function saveEmployee($model, $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            if ($image != '') {
                $newFileName = uniqid() . '-' . $image;
                $path = $request->image->storeAs('public/uploads/employee/image', $newFileName);
                $model->image = str_replace('public', '', $path);
                $request->file('image')->move('uploads/employee/image', $newFileName);
            }
        }

        $model->name = $request->input('name');
        $model->type = $request->input('type');
        $model->short_description = $request->input('short_description');
        $model->email = $request->input('email');
        $model->phone_number = $request->input('phone_number');
        $model->position = $request->input('position');
        $model->majors = $request->input('majors');
        $model->services = $request->input('services');
        $model->status = 1;

        $model->save();

        return $model;
    }

    public function saveUser($model, $request)
    {
        $model->employee = $request['employee'];
        $model->name = $request['name'];
        $model->email = $request['email'];
        $model->password = bcrypt($request['password']);
        $model->status = 1;
        $model->save();

        $model->assignRole($request['role']);

        return $model;
    }
}
