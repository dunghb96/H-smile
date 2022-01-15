<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = [];

    public function appointments()
    {
        return $this->hasOne(Appointment::class, 'id', 'appointment_id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'customer_id');
    }


    public function orderdetail(){
        return $this->hasMany(OrderDetail::class);
    }




}


