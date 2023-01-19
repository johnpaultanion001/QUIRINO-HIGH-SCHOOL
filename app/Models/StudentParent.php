<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'student_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parent_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
