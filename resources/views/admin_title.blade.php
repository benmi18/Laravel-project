@extends('layouts.master')

@section('school-main')
    <div>
        {{-- Title Section --}}
        @section('title')
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Admins Count: {{count($users)}}</h5>
                    </div>
                </div>
        @endsection
        {{-- End Title Section --}}
@endsection