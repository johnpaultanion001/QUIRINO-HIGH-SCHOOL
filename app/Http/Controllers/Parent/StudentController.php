<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Validator;
use App\Models\Student;
use App\Models\Notification;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index()
    {
        return view('parent.students.students');
    }
   

    public function show(Student $student)
    {
        return view('parent.students.student_record' , compact('student'));
    }
    

    public function faq()
    {
        return view('parent.faq.faq');
    }

    public function parentNotification(){
        $notifications = Notification::where('email', auth()->user()->email)->latest()->get();
        return view('parent.notifications.notifications', compact('notifications'));
    }
    

}
