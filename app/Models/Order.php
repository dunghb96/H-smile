<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function appointments()
    {
        return $this->hasOne(Appointment::class, 'id', 'appointment_id');
    }


    public function orderdetail(){
        return $this->hasMany(OrderDetail::class);
    }



}


