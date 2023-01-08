<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GradeStudent;
use Validator;

class ActivityController extends Controller
{
    
    public function index()
    {
        //
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'activity'           => ['required'],
            'quiz'           => ['required'],
            'performance'           => ['required'],
            'exam'          => ['required'],
            'total_grade'          => ['required'],
            
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        GradeStudent::create([
            'student_id'                => $request->input('student_id'),
            'activity'                  => $request->input('activity'),
            'quiz'                 => $request->input('quiz'),
            'performance'                 => $request->input('performance'),
            'exam'                 => $request->input('exam'),
            'total_grade'                  => $request->input('total_grade'),
            
           
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }

   
    public function show(GradeStudent $activity)
    {
        //
    }

    
    public function edit(GradeStudent $activity)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $activity,
            ]);
        }
    }

    
    public function update(Request $request, GradeStudent $activity)
    {
        $validated =  Validator::make($request->all(), [
            'activity'           => ['required'],
            'quiz'           => ['required'],
            'performance'           => ['required'],
            'exam'          => ['required'],
            'total_grade'          => ['required'],
            
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $activity->update([
            'activity'                  => $request->input('activity'),
            'quiz'                 => $request->input('quiz'),
            'performance'                 => $request->input('performance'),
            'exam'                 => $request->input('exam'),
            'total_grade'                  => $request->input('total_grade'),
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }

    public function destroy(GradeStudent $activity)
    {
        $activity->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
}
