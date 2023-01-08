<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Validator;
use Gate;
use Symfony\Component\HttpFoundation\Response;



class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('admin.teachers.teachers' , compact('teachers'));
    }
    
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'contact_number'          => ['required'],
            'gender'          => ['required'],
            'profession'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Teacher::create([
            'name'                  => $request->input('name'),
            'contact_number'                 => $request->input('contact_number'),
            'gender'                 => $request->input('gender'),
            'profession'                 => $request->input('profession'),
           
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }

    
    public function edit(Teacher $teacher)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $teacher,
            ]);
        }
    }

    
    public function update(Request $request, Teacher $teacher)
    {
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'contact_number'          => ['required'],
            'gender'          => ['required'],
            'profession'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $teacher->update([
            'name'                  => $request->input('name'),
            'contact_number'                 => $request->input('contact_number'),
            'gender'                 => $request->input('gender'),
            'profession'                 => $request->input('profession'),
        ]);

        return response()->json(['success' => 'Successfully updated.']);
    }

    
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
}
