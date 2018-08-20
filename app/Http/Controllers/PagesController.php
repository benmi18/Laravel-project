<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Course;
use App\Student;
use App\User;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('manager', ['except' => ['school']]);
    }

    public function school(){
        $students = Student::all();
        $courses = Course::all();

        return view('pages.school')->nest('title', 'school_title', compact(['students', 'courses']));
    }

    public function admin(){
        $users = User::all();
        $error = 'Back Off, you do not have the right permissions to enter this page';
        if (Gate::allows('manager', auth()->user())) {
            return view('pages.admin')->nest('title', 'admin_title', compact(['users']));
        }
        return redirect()->back()->withErrors($error);
    }
}
