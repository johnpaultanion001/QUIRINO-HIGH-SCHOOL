<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Validator;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\ClassesTeachers;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index()
    {
        
        $classes = ClassesTeachers::where('teacher_id', auth()->user()->teacher->id)->latest()->get();
        return view('teacher.students.classes' , compact('classes'));
    }
    public function classess_student(Classes $class)
    {
        $students = $class->students()->latest()->get();
        return view('teacher.students.students' , compact('students'));
    }

    public function show(Student $student)
    {
        $subjects = Subject::latest()->get();
        return view('teacher.students.student_info' , compact('student', 'subjects'));
    }
    
    

    
    public function edit(Student $student)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $student,
            ]);
        }
    }

    
    public function update(Request $request, Student $student)
    {
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'address'           => ['required'],
            'grade_section'           => ['required'],
            'mobile_number'          => ['required'],
            'mother_name'          => ['required'],
            'mother_number'          => ['required'],
            'father_name'          => ['required'],
            'father_number'          => ['required'],
            'lrn'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $student->update([
            'name'                  => $request->input('name'),
            'address'                 => $request->input('address'),
            'grade_section'                 => $request->input('grade_section'),
            'mobile_number'                 => $request->input('mobile_number'),
            'mother_name'                  => $request->input('mother_name'),
            'mother_number'                 => $request->input('mother_number'),
            'father_name'                 => $request->input('father_name'),
            'father_number'                 => $request->input('father_number'),
            'lrn'                 => $request->input('lrn'),
        ]);

        return response()->json(['success' => 'Successfully updated.']);
    }

    
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }

}
