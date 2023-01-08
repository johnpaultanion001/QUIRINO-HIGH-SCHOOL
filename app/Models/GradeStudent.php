<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'activity',
        'quiz',
        'performance',
        'exam',
        'total_grade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
