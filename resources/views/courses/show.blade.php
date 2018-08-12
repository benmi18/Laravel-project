@extends('layouts.master')

@section('school-main')
    <div class="student-box">
        <div class="row">
            <div class="col col-10">
                <p>Student: {{$course->name}}</p>
            </div>

            <div class="col col-2">
                <a href="/students/{{$course->id}}/edit" class="btn btn-default">Edit</a>
            </div>
        </div>

        <div class="row">
            <div class="col col-4">
                <img src="/images/courses/{{$course->image}}" alt="student image" width="100%">
            </div>

            <div class="col col-8">
                <p><h3>{{$course->name}}, {{count($course->students)}} Students</h3></p>
                <p>{{$course->description}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-4">
                <ul class="list-group list-group-flush">
                    @foreach ($course->students as $student)
                        <li class="list-group-item">{{$student->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection