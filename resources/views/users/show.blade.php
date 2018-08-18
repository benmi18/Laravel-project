@extends('layouts.master')

@section('admin-main')
    <div>
        {{-- Title Section --}}
        @section('title')
        <div class="col col-10">
            <h5>{{$user->role}}: {{$user->name}}</h5>
        </div>

        {{-- Edit btn --}}
        <div class="col col-2">
            <a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
        </div>
        @endsection
        {{-- End Title Section --}}

        <div class="row mb-5">
            {{-- User Image --}}
            <div class="col col-4">
                <img src="/storage/images/users/{{$user->image}}" alt="user image" width="100%">
            </div>

            {{-- User Image --}}
            <div class="col col-8">
                <p><h3>{{$user->name}}</h3></p>
                <p>Phone: {{$user->phone}}</p>
                <p>Email: {{$user->email}}</p>
            </div>
        </div>
    </div>
@endsection