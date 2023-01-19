<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Validator;

class StudentParentController extends Controller
{
    
    public function store(Request $request)
    {
        StudentParent::updateOrCreate(
            [
                'parent_id' => $request->input('parent_id'),
                'student_id' => $request->input('student_id'),
            ],
            [
                'parent_id' => $request->input('parent_id'),
                'student_id' => $request->input('student_id'),
            ]
        );


        return response()->json(['success' => 'Successfully added.']);
    }

    public function destroy(StudentParent $parent_student)
    {
        $parent_student->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
}
