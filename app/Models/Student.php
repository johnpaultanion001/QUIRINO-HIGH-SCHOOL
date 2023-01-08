<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'grade_section',
        'mobile_number',
        'mother_name',
        'mother_number',
        'father_name',
        'father_number',
        'lrn',
    ];

    public function attendances()
    {
        return $this->hasMany(AttendanceStudent::class, 'student_id');
    }

    public function activities()
    {
        return $this->hasMany(GradeStudent::class, 'student_id');
    }

   
}
