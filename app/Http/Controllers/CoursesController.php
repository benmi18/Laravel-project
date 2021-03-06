<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Course;
use App\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class CoursesController extends Controller
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
            return view('pages.school')->nest('create', 'courses.create');
        }
        return redirect()->back()->withErrors($error);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'description' => 'required|min:2',
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
            $path = request()->file('image')->storeAs('public/images/courses', $fileNameToStore);
        } else {
            $fileNameToStore = 'course.jpg';
        }
        
        // Update Course 
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->image = $fileNameToStore;
        $course->save();

        return redirect('/courses/'.$course->id)->with('success', 'Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('pages.school')->nest('show', 'courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $error = 'Back Off, you do not have the right permissions to enter this page';
        if (Gate::allows('manager', auth()->user())) {
            return view('pages.school')->nest('create', 'courses.create', compact('course'));
        }
        return redirect()->back()->withErrors($error);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'description' => 'required|min:2',
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
            $path = request()->file('image')->storeAs('public/images/courses', $fileNameToStore);
            // Delete Old File
            if ($course->image != 'course.jpg') {
                Storage::delete('public/images/courses/'.$course->image);
            }
            // Update the student
            $course->image = $fileNameToStore;
        } 
        
        // Update Course 
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->save();

        return redirect('/courses/'.$course->id)->with('success', 'Student Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $errors = new MessageBag();
        // Student in course error
        $errors->add('studen_in_course', 'Students Taking this course');

        // Check for courses
        if (count($course->students)) {
            return redirect()->back()->withErrors($errors);
        }

        if ($course->image != 'course.jpg') {
            // Delete the image
            Storage::delete('public/images/courses'.$course->image);
        }

        $course->delete();
        return redirect('/')->with('success', 'Course Removed');
    }
}
