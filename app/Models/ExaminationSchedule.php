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

    public function order(){
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    // function saveExaminationSchedule($model, $data)
    // {
    //     $model->appointment = $data['appointment'];
    //     $model->date_at = $data['date_at'];
    //     $model->doctor = $data['doctor'];
    //     $model->patient_id = $data['patient_id'];
    //     $model->time_at = $data['time_at'];
    //     $model->status = 1;

    //     $model->save();

    //     return $model;
    // }

    public function xeplich($model, $request)
    {
        $dateat = (isset($request->dateat) && $request->dateat != '') ? date("Y-m-d", strtotime(str_replace('/', '-', $request->dateat))) : date("Y-m-d");
        $starttime = (isset($request->start_time) && $request->start_time != '') ? date("H:i:s", strtotime($request->start_time)) : '';
        $endtime = (isset($request->end_time) && $request->end_time != '') ? date("H:i:s", strtotime($request->end_time)) : '';
        // echo $endtime;
        $model->date_at = $dateat;
        $model->doctor_id = $request->input('doctor_id');
        $model->start_time = $starttime;
        $model->end_time = $endtime;
        $model->note = $request->input('note');
        $model->status = 2;
        $model->save();

        return $model;
    }
}
