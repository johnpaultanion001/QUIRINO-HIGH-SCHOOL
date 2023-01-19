<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'email',
        'message',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
