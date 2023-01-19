<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;


class NotificationController extends Controller
{
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'parent_email'           => ['required', 'email'],
            'message'          => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $emailNotif = [
           
            'message'               =>  $request->input('message'),
        ];

        Mail::to($request->input('parent_email'))
            ->send(new EmailNotification($emailNotif));

        Notification::create([
            'student_id'                  => $request->input('student_id'),
            'email'                  => $request->input('parent_email'),
            'message'                 => $request->input('message'),
           
        ]);


        return response()->json(['success' => 'Successfully sent.']);
    }
}
