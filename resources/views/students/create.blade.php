@extends('layouts.master')

@section('school-main')
    <div class="container">
        <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email">
        </div>

        <div class="row">
            <div class="col col-5 m-auto">
                <img src="/images/students/student.jpg" class="mb-2" width="100%">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group form-check">
            @foreach($courses as $course)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="{{$course->id}}">
                    <label class="custom-control-label" for="{{$course->id}}">{{$course->name}}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection