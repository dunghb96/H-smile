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

    public function patients()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
    public function appointments()
    {
        return $this->hasOne(Appointment::class, 'id', 'appointment');
    }

    function saveExaminationSchedule($model, $data)
    {
        $model->appointment = $data['appointment'];
        $model->date_at = $data['date_at'];
        $model->doctor = $data['doctor'];
        $model->time_at = $data['time_at'];
        $model->status = 1;

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
