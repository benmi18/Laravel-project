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
    
    @include('layouts.errors')
    @if ($edit)
    {{-- Delete button --}}
        {!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'method' => 'POST']) !!}
            {{ method_field('DELETE') }}
            {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2', 'onclick' => 'return alert()'])}}
        {!! Form::close() !!}
    @endif
    
    <form method="POST" action="/students" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- Save Delete buttons --}}
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
        

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
                <img src="/storage/images/students/<?= $edit ? $student->image : 'student.jpg' ?>" class="mb-2 pre-img" width="100%">
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
</div>
@endsection
<script>
    // Upload image preview //
    function previewFile() {
        var preview = document.querySelector('.pre-img');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        // when user select an image, `reader.readAsDataURL(file)` will be triggered
        // reader instance will hold the result (base64) data
        // next, event listener will be triggered and we call `reader.result` to get
        // the base64 data and replace it with the image tag src attribute
        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    function alert() {
        if (window.confirm("Are You Sure You Wand To Delete")) {
            document.forms[1].submit();
            console.log('alert true');
        } else {
            return false;
            console.log('alert false');
        }
    }
</script>
