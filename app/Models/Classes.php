<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'section',
        'grading',

    ];

    public function teachers()
    {
        return $this->hasMany(ClassesTeachers::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(ClassesStudents::class, 'class_id');
    }
    public function attendances()
    {
        return $this->hasMany(AttendanceStudent::class, 'class_id');
    }


}
