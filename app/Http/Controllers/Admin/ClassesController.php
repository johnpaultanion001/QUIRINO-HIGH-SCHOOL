<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\ClassesStudents;
use App\Models\ClassesTeachers;
use Illuminate\Http\Request;
use Validator;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ClassesController extends Controller
{
   
    public function index()
    { 
    if(auth()->user()->roles()->pluck('id')->implode(', ') == '1'){
        $classes = Classes::latest()->get();
        return view('admin.classes.classes' , compact('classes'));
    }
    if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){

        return redirect()->route('teacher.classes');
    }

    if(auth()->user()->roles()->pluck('id')->implode(', ') == '3'){

        return redirect()->route('parent.students.index');
    }

       
    }
    
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'section'           => ['required'],
            'grading'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

      Classes::create([
            'section'                  => $request->input('section'),
            'grading'                 => $request->input('grading'),
           
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }

    
    public function edit(Classes $class)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $class,
            ]);
        }
    }

    public function show(Classes $class)
    {
        $teachers = Teacher::latest()->get();
        $students = Student::latest()->get();
        return view('admin.classes.view_students_teachers.views' , compact('class','teachers','students'));
    }

    public function store_teacher_student(Request $request){

        $action = $request->input('action');

        if($action == 'TEACHER'){
            $validated =  Validator::make($request->all(), [
                'teacher_id'           => ['required'],
            ]);
        }else{
            $validated =  Validator::make($request->all(), [
                'student_id'           => ['required'],
            ]);
        }

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if($action == 'TEACHER'){
            ClassesTeachers::updateOrCreate(
                [
                    'class_id' => $request->input('class_id'),
                    'teacher_id' => $request->input('teacher_id'),
                ],
                [
                    'class_id' => $request->input('class_id'),
                    'teacher_id' => $request->input('teacher_id'),
                ]
            );
        }else{
            ClassesStudents::updateOrCreate(
                [
                    'class_id' => $request->input('class_id'),
                    'student_id' => $request->input('student_id'),
                ],
                [
                    'class_id' => $request->input('class_id'),
                    'student_id' => $request->input('student_id'),
                ]
            );
        }

        return response()->json(['success' => 'Successfully updated.']);
    }

    
    public function store_teacher_student_destroy($id, $role)
    {
        if($role == 'TEACHER'){
            ClassesTeachers::where('id', $id)->delete();
        }else{
            ClassesStudents::where('id', $id)->delete();
        }
        return response()->json(['success' => 'Successfully removed.']);
    }
    
    public function update(Request $request, Classes $class)
    {
        $validated =  Validator::make($request->all(), [
            'section'           => ['required'],
            'grading'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $class->update([
            'section'                  => $request->input('section'),
            'grading'                 => $request->input('grading'),
           
        ]);
        return response()->json(['success' => 'Successfully updated.']);
    }

    
    public function destroy(Classes $class)
    {
        $class->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }


    public function advisory($id)
    {
        $classTeacher = ClassesTeachers::where('id', $id)->first();
        if($classTeacher->isAdvisory == true){
           $classTeacher->update([
            'isAdvisory' => false,
           ]);
        }else{
            $classTeacher->update([
                'isAdvisory' => true,
               ]);
        }
        return response()->json(['success' => 'Successfully updated.']);
    }
}
