<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationSchedule extends Model
{
    use HasFactory;
    protected $table = 'examination_schedules';

    protected $guarded = [];
    const SHIFT= [
        1 => 'Ca sáng',
        2 => 'Ca chiều'
    ];

    const STATUS= [
        1 => 'Chờ khám',
        2 => 'Hoàn thành',
        3 => 'Đã hủy'
    ];

    public function doctors()
    {
        return $this->hasOne(Employee::class, 'id', 'doctor');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'customer_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    public function appointments()
    {
        return $this->hasOne(Appointment::class, 'id', 'appointment');
    }
    public function Prescription()
    {
        return $this->hasMany(Prescription::class, 'id', 'schedule_id');
    }

    function saveExaminationSchedule($model, $data)
    {
        $model->appointment = $data['appointment'];
        $model->date_at = $data['date_at'];
        $model->doctor = $data['doctor'];
        $model->patient_id = $data['patient_id'];
        $model->time_at = $data['time_at'];
        $model->status = 1;

        $model->save();

        return $model;
    }

    public function xeplich($model, $request)
    {
        $model->doctor_id = $request->input('doctor_id');
        $model->start_time = $request->input('start_time');
        $model->end_time = $request->input('end_time');
        $model->note = $request->input('note');
        $model->status = 3;
        $model->save();

        return $model;
    }

    function saveTT($model)
    {
        $model->status = 2;
        $model->save();

        return $model;
    }
}
