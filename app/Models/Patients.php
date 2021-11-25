<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $guarded = [];

    const GENDER = [
        0 => 'Nam',
        1 => 'Nữ'
    ];

}
