<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;
use Validator;
use App\Models\Student;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ParentsController extends Controller
{
    public function index()
    {
        $parents = Parents::latest()->get();
        return view('admin.parents.parents' , compact('parents'));
    }
    
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'contact_number'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Parents::create([
            'name'                  => $request->input('name'),
            'contact_number'          => $request->input('contact_number'),
           
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }
    public function show(Parents $parent)
    {
        $students = Student::latest()->get();
        return view('admin.parents.assign_student' , compact('parent','students'));
    }
    
    public function edit(Parents $parent)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $parent,
            ]);
        }
    }

    
    public function update(Request $request, Parents $parent)
    {
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'contact_number'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $parent->update([
            'name'                  => $request->input('name'), 
            'contact_number'          => $request->input('contact_number'),
        ]);

        return response()->json(['success' => 'Successfully updated.']);
    }

    
    public function destroy(Parents $parent)
    {
        $parent->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
}
