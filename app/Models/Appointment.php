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
        1 => 'Chờ xác nhận',
        2 => 'Đang thực hiện',
        3 => 'Đã hoàn thành',
    ];

    public function patients()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    public function doctor()
    {
        return $this->hasOne(Employee::class, 'id', 'doctor_id')->where('type', 1);
    }

    function saveExaminationSchedule($model, $data)
    {
        $model->appointment = $data['appointment'];
        $model->date_at = $data['date_at'];
        $model->shift = $data['shift'];
        $model->status = 1;

        $model->save();

        return $model;
    }

    function saveSchedule($model, $data)
    {

    }
}
