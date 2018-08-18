@extends('layouts.master') 

@section('school-main')
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

    
    {{-- Delete button --}} 
    @if ($edit) 
        {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
            {{ method_field('DELETE') }} 
            {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2 float-right', 'id' => 'delete-btn'])}}
        {!! Form::close() !!} 
    @endif

    {{-- Form Start --}}
    {{-- Submit Button --}}
    @if ($edit) {{-- PUT Request for Edit --}} 
        {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
            {{ method_field('PUT') }} 
            {{Form::submit('Submit', ['class' => 'btn btn-warning mb-5'])}}
        
    @else {{-- POST Request for Create --}}
        {!! Form::open(['action' => ['StudentsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
            {{Form::submit('Submit', ['class' => 'btn btn-success mb-5'])}}
    @endif
    
        {{csrf_field()}}

        {{-- Student Info --}}
        <div class="row">
            <div class="col col-7">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $edit ? $student->name : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit ? $student->phone : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $edit ? $student->email : '' ?>" required>
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
    {!! Form::close() !!} 
    @include('layouts.errors')
</div>
@include('layouts.scripts')
@endsection

