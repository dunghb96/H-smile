<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $guarded = [];

    const STATUS = [
        0 => 'Hủy',
        1 => 'Chờ xác nhận',
        2 => 'Đã xác nhận',
        3 => 'Hoàn thành'
    ];

    const SHIFT= [
        1 => 'Ca sáng',
        2 => 'Ca chiều'
    ];

    const GENDER = [
        0 => 'nam',
        1 => 'nữ',
        2 => 'khác'
    ];

    public function patients()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'services');
    }

    public function doctor()
    {
        return $this->hasOne(Employee::class, 'id', 'doctor_id')->where('type', 1);
    }

    // function saveExaminationSchedule($model, $data)
    // {
    //     $model->patient_id = $data['patient_id'];
    //     $model->appointment = $data['appointment'];
    //     $model->date_at = $data['date_at'];
    //     $model->doctor = $data['doctor'];
    //     $model->time_at = $data['time_at'];
    //     $model->status = 1;

    //     $model->save();

    //     return $model;
    // }

    // function saveAppointment($model, $data) {
    //     $model->customer_id = $data['customer_id'];
    //     $model->customer_id = $data['customer_id'];
    //     $model->name = $data['name'];
    //     $model->age = $data['age'];
    //     $model->phone_number = $data['phone_number'];
    //     $model->email = $data['email'];
    //     $model->services = $data['services'];
    //     $model->date = $data['date'];
    //     $model->shift = $data['shift'];
    //     $model->address = $data['address'];
    //     $model->gender = $data['gender'];
    //     $model->note = $data['note'];
    //     $model->status = $data['status'];

    //     $model->save();

    //     return $model;
    // }
}
