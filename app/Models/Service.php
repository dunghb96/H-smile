<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'price', 'description', 'status',];
    protected $primaryKey = 'id';
    const LIMIT = 20;
}
