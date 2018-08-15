@extends('layouts.master') @section('school-main')
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'students.create') {
        $edit = true;
    }
?>
<div>
    {{-- Title Section --}}
    @section('title')
        <h3>
            <?= $edit ? 'Edit '.$student->name : 'Add New Student' ?>
        </h3>
    @endsection
    {{-- End Title Section --}}
    <hr>
    {{-- Submit / Delete Buttons --}}
    <div class="row mb-5">
        <div class="col">
            {{-- Submit button --}} 
            @if ($edit)
                {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST']) !!} 
                    {{ method_field('PUT') }} 
                    {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2', 'id' => 'delete-btn'])}}
                {!! Form::close() !!} 
            @else
                {!! Form::open(['action' => ['StudentsController@store', $student->id], 'method' => 'POST']) !!} 
                    {{Form::submit('Submit', ['class' => 'btn btn-success mb-2'])}}
                {!! Form::close() !!} 
            @endif
        </div>

        <div class="col text-right">
            {{-- Delete button --}} 
            @if ($edit) 
                {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST']) !!} 
                    {{ method_field('DELETE') }} 
                    {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2', 'id' => 'delete-btn'])}}
                {!! Form::close() !!} 
            @endif 
        </div>
    </div>

    {{-- Form --}}
    <form method="POST" action="/students" enctype="multipart/form-data">
        {{csrf_field()}}

        {{-- Student Info --}}
        <div class="row">
            <div class="col col-7">
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
            </div>

            {{-- Image --}}
            <div class="col col-4">
                <img src="/storage/images/students/<?= $edit ? $student->image : 'student.jpg' ?>" class="mb-2 pre-img" width="100%">
                
                {{-- Input File --}}
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="previewFile()">
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
@include('layouts.scripts')
@endsection

