@extends('layouts.master') 

@section('school-main')
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'courses.create') {
        $edit = true;
    }
?>
    <div>
        {{-- Title Section --}}
        @section('title')
            <h3>
                <?= $edit ? 'Edit '.$course->name : 'Add New Course' ?>
            </h3>
        @endsection
        {{-- End Title Section --}}
        <hr>

            <div class="row mb-5">
                <div class="col">
                    {{-- Submit button --}} 
                    {!! Form::open(['action' => ['CoursesController@store', $course->id], 'method' => 'POST']) !!} 
                        {{Form::submit('Submit', ['class' => 'btn btn-success mb-2'])}}
                    {!! Form::close() !!} 
                </div>

                <div class="col text-right">
                    {{-- Delete button --}} 
                    @if ($edit) 
                        {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST']) !!} 
                            {{ method_field('DELETE') }} 
                            {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2', 'id' => 'delete-btn'])}}
                        {!! Form::close() !!} 
                    @endif 
                </div>
            </div>

        <form method="POST" action="/courses" enctype="multipart/form-data">
            {{csrf_field()}} 
            
            {{-- Student Info --}}
            <div class="row">
                <div class="col col-7">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="<?= $edit ? $course->name : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" value="<?= $edit ? $course->description : '' ?>"></textarea>
                    </div>
                </div>

                {{-- Image --}}
                <div class="col col-4">
                    <img src="/storage/images/courses/<?= $edit ? $course->image : 'course.jpg' ?>" class="mb-2 pre-img" width="100%"> 
                    {{-- Input File --}}
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" onchange="previewFile()">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <h3>{{count($course->students)}} students taking this course</h3>

            @include('layouts.errors')
        </form>
    </div>

    @include('layouts.scripts') @endsection
