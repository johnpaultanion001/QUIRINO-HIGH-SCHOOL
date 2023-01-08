<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'student_id',
        'class_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

   
}
