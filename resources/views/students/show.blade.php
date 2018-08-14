@extends('layouts.master')

@section('school-main')
    <div class="student-box">
        <div class="row">
            <div class="col col-10">
                <p>Student: {{$student->name}}</p>
            </div>

            <div class="col col-2">
                <a href="/students/{{$student->id}}/edit" class="btn btn-default">Edit</a>
            </div>
        </div>

        <div class="row">
            <div class="col col-4">
                <img src="/storage/images/students/{{$student->image}}" alt="student image" width="100%">
            </div>

            <div class="col col-8">
                <p><h3>{{$student->name}}</h3></p>
                <p>{{$student->phone}}</p>
                <p>{{$student->email}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col col-4">
                <ul class="list-group list-group-flush">
                    @foreach ($student->courses as $course)
                        <li class="list-group-item">{{$course->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection