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

    public function doctors()
    {
        return $this->hasOne(Employee::class, 'id', 'doctor');
    }
}
