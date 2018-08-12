@extends('layouts.master') 
@section('content')
    <div class="row">
        <div class="col col-5">
            @include('layouts.school-left-panel')
        </div>
        <div class="col col-7">
            @yield('school-main')
        </div>
    </div>
@endsection
