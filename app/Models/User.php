<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'date',
        'phoneNumber',
        'identityCard',
        'address',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function saveAccountSetting($model, $request)
    {
        if ($request->hasFile('avatar')) {
            $image = $request->image->getClientOriginalName();
            if ($image != '') {
                $newFileName = uniqid() . '-' . $image;
                $path = $request->image->storeAs('public/uploads/user/image', $newFileName);
                $model->image = str_replace('public', '', $path);
                $request->file('avatar')->move('uploads/user/image', $newFileName);
            }
        }

        $model->price = $request->input('name');

        $model->save();

        return $model;
    }
}
