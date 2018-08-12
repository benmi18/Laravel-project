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
    }

    public function school(){
        return view('pages.school');
    }

    public function admin(){
        return view('pages.admin');
    }
}
