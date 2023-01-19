<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassesTeachers;
use App\Models\Classes;
use App\Models\AttendanceStudent;
use Carbon\Carbon;

class ClassesController extends Controller
{
    public function classes()
    {
        $classes = ClassesTeachers::where('teacher_id', auth()->user()->teacher->id)->latest()->get();
        return view('teacher.classes.classes' , compact('classes'));
    }
    
    public function attendance(Classes $classes)
    {
        $attendances_fortoday = AttendanceStudent::where('class_id', $classes->id)->whereDate('created_at', Carbon::today())->latest()->get();
        return view('teacher.attendance.attendance' , compact('classes','attendances_fortoday'));
    }
    public function attendance_store($teacher_id, $student_id, $class_id)
    {
        AttendanceStudent::create(
            [
                'teacher_id' => $teacher_id,
                'student_id' => $student_id,
                'class_id' => $class_id,
            ]
        );

        return response()->json(['success' => 'Successfully attended.']);
    }

    public function classes_attendance()
    {
        $classes = ClassesTeachers::where('teacher_id', auth()->user()->teacher->id)->latest()->get();
        return view('teacher.attendance.classes' , compact('classes'));
    }
    public function delete_attendance(AttendanceStudent $id)
    {
        $id->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
    
    
    
    
    
}
