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
    <form>
        {{-- Save Delete buttons --}}
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        @if ($edit)
            <button type="submit" class="btn btn-danger mb-2">Delete</button>
        @endif

        {{-- Student Info --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" value="<?= $edit ? $student->name : '' ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" value="<?= $edit ? $student->phone : '' ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="<?= $edit ? $student->email : '' ?>">
        </div>

        {{-- Image --}}
        <div class="row">
            <div class="col col-5 m-auto">
                <img src="/images/students/<?= $edit ? $student->image : 'student.jpg' ?>" class="mb-2" width="100%">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
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
                            <input type="checkbox" class="custom-control-input" id="{{$course->id}}" checked>
                        @endif
                    @endforeach
                @endif
                <input type="checkbox" class="custom-control-input" id="{{$course->id}}" >
                <label class="custom-control-label" for="{{$course->id}}">{{$course->name}}</label>
            </div>
            @endforeach
        </div>
    </form>
</div>
@endsection
