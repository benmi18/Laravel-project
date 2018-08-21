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

        {{-- Delete button --}} 
        @if ($edit && auth()->user()->role != 'sales') 
            {!! Form::open(['action' => ['CoursesController@destroy', $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
                {{ method_field('DELETE') }} 
                {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2 float-right', 'id' => 'delete-btn'])}}
            {!! Form::close() !!} 
        @endif

        {{-- Form Start --}}
        {{-- Submit Button --}}
        @if ($edit) {{-- PUT Request for Edit --}} 
            {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
                {{ method_field('PUT') }} 
                {{Form::submit('Submit', ['class' => 'btn btn-warning mb-5'])}}
            
        @else {{-- POST Request for Create --}}
            {!! Form::open(['action' => ['CoursesController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
                {{Form::submit('Submit', ['class' => 'btn btn-success mb-5'])}}
        @endif

        {{csrf_field()}}
            
            {{-- Course Info --}}
            <div class="row">
                <div class="col col-7">
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="<?= $edit ? $course->name : '' ?>">
                    </div>
                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8">
                        <?= $edit ? $course->description : '' ?>
                        </textarea>
                    </div>
                </div>

                {{-- Image --}}
                <div class="col col-4 m-auto">
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

            @if ($edit)
                <h3>{{count($course->students)}} students taking this course</h3>
            @endif
        </form>
    </div>

    @include('layouts.scripts') @endsection
