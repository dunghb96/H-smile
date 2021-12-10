<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'price', 'short_desc', 'description', 'status', 'parent_id', 'slug'];
    protected $primaryKey = 'id';

    public function serviceChildrent()
    {
        return $this->hasMany(Service::class, 'parent_id');
    }
}
