<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'employee_name',
        'course_id',
        'course_desc',
        'course_end',
        'course_result'
    ];
}
