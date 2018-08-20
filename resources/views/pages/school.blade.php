@extends('layouts.master') 
@section('content')
@include('layouts.errors')
    <div class="row">
        <div class="col col-6">
            @include('layouts.school-left-panel')
        </div>
        <div class="col col-5 ml-auto">
            {{-- Title --}}
            <div class="row mb-3 alert alert-secondary">
                @yield('title')
            </div>
            {{-- Content --}}
            @yield('school-main')
        </div>
    </div>
@endsection
