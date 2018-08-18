@extends('layouts.master')

@section('school-main')
    <div>
        {{-- Title Section --}}
        @section('title')
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Students Count: {{count($students)}}</h5>
                    </div>
                    <div class="col">
                        <h5>Courses Count: {{count($courses)}}</h5>
                    </div>
                </div>
        @endsection
        {{-- End Title Section --}}
@endsection