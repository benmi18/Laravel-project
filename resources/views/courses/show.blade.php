@extends('layouts.master')

@section('school-main')
    <div>
        @section('title')
            <div class="col col-10">
                <h5>Cource: {{$course->name}}</h5>
            </div>

            @if (auth()->user()->role != 'sales')
                <div class="col col-2">
                    <a href="/courses/{{$course->id}}/edit" class="btn btn-primary">Edit</a>
                </div>
            @endif
        @endsection

        <div class="row mb-5">
            <div class="col col-4">
                <img src="/storage/images/courses/{{$course->image}}" alt="student image" width="100%">
            </div>

            <div class="col col-8">
                <h3>{{$course->name}}, {{count($course->students)}} Students</h3>
                <p>{{$course->description}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-4">
                <h4 class="mb-3">Students List</h4>
                <ul class="list-group list-group-flush">
                    @foreach ($course->students as $student)
                        <li class="list-group-item">
                            <a href="/students/{{$student->id}}">
                                {{$student->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection