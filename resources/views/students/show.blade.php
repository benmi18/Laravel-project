@extends('layouts.master')

@section('school-main')
    <div>
        {{-- Title Section --}}
        @section('title')
        <div class="col col-10">
            <h5>Student: {{$student->name}}</h5>
        </div>

        <div class="col col-2">
            <a href="/students/{{$student->id}}/edit" class="btn btn-primary">Edit</a>
        </div>
        @endsection
        {{-- End Title Section --}}

        <div class="row mb-5">
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
                <h4 class="mb-3">Couses List</h4>
                <ul class="list-group list-group-flush">
                    @foreach ($student->courses as $course)
                        <li class="list-group-item">
                            <a href="/courses/{{$course->id}}">
                                {{$course->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection