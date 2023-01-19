<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesTeachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'teacher_id',
        'isAdvisory',
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
