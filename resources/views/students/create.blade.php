@extends('layouts.master') @section('school-main')
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'students.create') {
        $edit = true;
    }
?>
<div class="container">
    <div class="row">
        <h3><?= $edit ? 'Edit '.$student->name : 'Add New Student' ?></h3>
    </div>
    <hr>
    {{-- {!! Form::open(['action' => ['StudentsController@destroy'], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!} --}}
    <form method="POST" action="/students" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- Save Delete buttons --}}
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        @if ($edit)
            <button class="btn btn-danger mb-2">Delete</button>
        @endif

        {{-- Student Info --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name" value="<?= $edit ? $student->name : '' ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit ? $student->phone : '' ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $edit ? $student->email : '' ?>">
        </div>

        {{-- Image --}}
        <div class="row">
            <div class="col col-5 m-auto">
                <img src="/storage/images/students/<?= $edit ? $student->image : 'student.jpg' ?>" class="mb-2" width="100%">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Courses check box --}}
        <div class="form-group form-check">
            @foreach($courses as $course)
            <div class="custom-control custom-checkbox">
                @if ($edit)
                    @foreach ($student->courses as $stCourse)
                        @if ($course->id == $stCourse->id)
                            <input type="checkbox" class="custom-control-input" name="courses[]" value="{{$course->id}}" id="{{$course->id}}" checked>
                        @endif
                    @endforeach
                @endif
                <input type="checkbox" class="custom-control-input" name="courses[]" value="{{$course->id}}" id="{{$course->id}}" >
                <label class="custom-control-label" for="{{$course->id}}">{{$course->name}}</label>
            </div>
            @endforeach
        </div>
    </form>
    @include('layouts.errors')
</div>
@endsection
