<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Parents;
use Validator;
use Illuminate\Support\Facades\Hash;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function account_teachers()
    {
        $select_teachers = Teacher::where('user_id', null)->latest()->get();
        $teachers = RoleUser::where('role_id', 2)->orderBy('user_id', 'desc')->get();
        return view('admin.manage_teachers_account' , compact('teachers','select_teachers'));
    }

    public function account_parents()
    {
        $select_parents = Parents::where('user_id', null)->latest()->get();
        $parents = RoleUser::where('role_id', 3)->orderBy('user_id', 'desc')->get();
        return view('admin.manage_parents_account' , compact('parents','select_parents'));
    }
    public function admins()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $admins = RoleUser::where('role_id', 1)->get();
        return view('admin.manage_administrator' , compact('admins'));
    }

    public function edit(User $account){
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $account,
            ]);
        }
    }

    public function store(Request $request){
        date_default_timezone_set('Asia/Manila');
        $request->input('role') == 2 ? $validation_teacher = 'required' : $validation_teacher = 'nullable';
        $request->input('role') == 3 ? $validation_parent = 'required' : $validation_parent = 'nullable';
        
        $validated =  Validator::make($request->all(), [
            'teacher_id'     => [$validation_teacher],
            'parent_id'      => [$validation_parent],
            'name'           => ['nullable'],
            'email'          => ['required',  'email', 'max:255', 'unique:users'],
            'password'       => ['required', 'min:8'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $account = User::create([
            'name'                  => $request->input('name'),
            'email'                 => $request->input('email'),
            'password'              => Hash::make($request->input('password')),
            'email_verified_at'     => date("Y-m-d H:i:s"),
        ]);

        RoleUser::insert([
            'user_id' => $account->id,
            'role_id' => $request->input('role'),
        ]);
        if($request->input('role') == 2){
            Teacher::where('id',$request->input('teacher_id'))->update([
                    'user_id' => $account->id,
            ]);
        }elseif($request->input('role') == 3){
            Parents::where('id',$request->input('parent_id'))->update([
                'user_id' => $account->id,
        ]);
        }
    

        return response()->json(['success' => 'Successfully created.']);
    }
    
    public function update(Request $request ,User $account){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            
            'name'           => ['nullable'],
            'email'          => ['required',  'email', 'max:255', 'unique:users,email,'.$account->id],
            'password'       => ['nullable','min:8'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $account->update([
            'name'                  => $request->input('name'),
            'email'                 => $request->input('email'),
            'password'              => Hash::make($request->input('password')),
        ]);

       
        return response()->json(['success' => 'Successfully updated.']);
    }

    public function destroy(User $account){
        date_default_timezone_set('Asia/Manila');
        Teacher::where('user_id', $account->id)->update([
            'user_id' => null,
        ]);
        Parents::where('user_id', $account->id)->update([
            'user_id' => null,
        ]);
        RoleUser::where('user_id', $account->id)->delete();
        $account->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }
}
