<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Gate;
use App\Student;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error = 'Back Off, you do not have the right permissions to enter this page';
        if (Gate::allows('manager', auth()->user())) {
            $courses = Course::all();
            return view('pages.school')->nest('create', 'students.create', compact('courses'));
        }
        return redirect()->back()->withErrors($error);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Form Input
        $this->validate(request(), [
            'name' => 'required|min:2',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'image' => 'image|nullable|max:1700',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Get the file name with the extension
            $fileNameWithExt = request()->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just EXT
            $extension = request()->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = request()->file('image')->storeAs('public/images/students', $fileNameToStore);
        } else {
            $fileNameToStore = 'student.jpg';
        }
        
        // Create Student 
        $student = new Student;
        $student->name = request('name');
        $student->phone = request('phone');
        $student->email = request('email');
        $student->image = $fileNameToStore;
        $student->save();
        $student->courses()->attach(request('courses'));

        return redirect('/students/'.$student->id)->with('success', 'Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('pages.school')->nest('show', 'students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('pages.school')->nest('create', 'students.create', compact('courses', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'image' => 'image|nullable|max:1700',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Get the file name with the extension
            $fileNameWithExt = request()->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just EXT
            $extension = request()->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = request()->file('image')->storeAs('public/images/students', $fileNameToStore);
            // Update the student
            $student->image = $fileNameToStore;
        } 
        
        // Update Student 
        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->save();
        $student->courses()->detach();
        $student->courses()->attach(request('courses'));

        return redirect('/students/'.$student->id)->with('success', 'Student Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $error = 'Back Off, you do not have the right permissions to enter this page';
        if (Gate::allows('manager', auth()->user())) {
            $errors = new MessageBag();
            // Student in course error
            $errors->add('studen_in_course', 'Student in course');

            // Check for courses
            if (count($student->courses)) {
                return redirect()->back()->withErrors($errors);
            }

            if ($student->image != 'student.jpg') {
                // Delete the image
                Storage::delete('public/images/students'.$student->image);
            }

            $student->delete();
            return redirect('/')->with('success', 'Student Removed');
        }
        return redirect()->back()->withErrors($error);
    }
}
