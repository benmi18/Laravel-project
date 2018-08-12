@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col col-3">
            @include('layouts.admin-left-panel')
        </div>
        <div class="col col-9">
            @yield('admin-main')
        </div>
    </div>
@endsection