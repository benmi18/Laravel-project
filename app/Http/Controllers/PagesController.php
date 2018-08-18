<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\User;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('manager', ['except' => ['school']]);
    }

    public function school(){
        $students = Student::all();
        $courses = Course::all();

        return view('pages.school')->nest('title', 'school_title', compact(['students', 'courses']));
    }

    public function admin(){
        $users = User::all();
        return view('pages.admin')->nest('title', 'admin_title', compact(['users']));
    }
}
