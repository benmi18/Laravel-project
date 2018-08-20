@extends('layouts.master')
@section('content')
@include('layouts.errors')
    <div class="row">
        {{-- Left Panel Column --}}
        <div class="col col-3 ">
            @include('layouts.admin-left-panel')
        </div>

        {{-- Right Panel Column --}}
        <div class="col col-5 ml-auto mr-auto">
            {{-- Title --}}
            <div class="row mb-3 alert alert-secondary">
                @yield('title')
            </div>
            {{-- Content --}}
            @yield('admin-main')
        </div>
    </div>
@endsection