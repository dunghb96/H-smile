<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = 'service_categories';
    protected $guarded = [];

    const STATUS = [
        0 => 'deleted',
        1 => 'active',
        2 => 'non active'
    ];
}
