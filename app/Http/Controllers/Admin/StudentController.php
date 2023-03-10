<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Validator;
use App\Models\Student;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('admin.students.students' , compact('students'));
    }
    
    public function store(Request $request)
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

        Student::create([
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


        return response()->json(['success' => 'Successfully created.']);
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
