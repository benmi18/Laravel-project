@extends('layouts.master') 

@section('admin-main')
<?php
// Check The Current Route To Determine If Location Is Create Or Edit
    $route = Route::currentRouteName();
    $edit = false;
    if ($route != 'users.create') {
        $edit = true;
    }
?>
<div>
    {{-- Title Section --}}
    @section('title')
        <h3>
            <?= $edit ? 'Edit '.$user->name : 'Add New Admin' ?>
        </h3>
    @endsection
    {{-- End Title Section --}}
    <hr>

    
    {{-- Delete button --}} 
    @if ($edit && $user->id != auth()->user()->id) 
        {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST']) !!} 
            {{ method_field('DELETE') }} 
            {{Form::submit('Delete', ['class' => 'btn btn-danger mb-2 float-right', 'id' => 'delete-btn'])}}
        {!! Form::close() !!} 
    @endif

    {{-- Form --}}
    @if ($edit) {{-- PUT Request for Edit --}} 
        {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
            {{ method_field('PUT') }} 
            {{Form::submit('Submit', ['class' => 'btn btn-warning mb-5'])}}
        
    @else {{-- POST Request for Create --}}
        {!! Form::open(['action' => ['UsersController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
            {{Form::submit('Submit', ['class' => 'btn btn-success mb-5'])}}
    @endif
    
        {{csrf_field()}}

        {{-- User Info --}}
        <div class="row">
            <div class="col col-8">
                <div class="form-group row">
                    {{-- Name --}}
                    <div class="col">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $edit ? $user->name : '' ?>">
                    </div>

                    {{-- Role Options --}}
                    <div class="col">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" @if ($edit && $user->role == 'owner' || $edit &&  $user->id == auth()->user()->id) disabled @endif>
                            <option></option>
                            <option value="manager">Manager</option>
                            <option value="sales">Sales</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    {{-- Phone --}}
                    <div class="col">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit ? $user->phone : '' ?>">
                    </div>

                    {{-- Email --}}
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $edit ? $user->email : '' ?>">
                    </div>
                </div>

                {{-- Password Input --}}
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"> 
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- Password Confirm --}}
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            {{-- Image --}}
            <div class="col col-4 m-auto">
                <img src="/storage/images/users/<?= $edit ? $user->image : 'user.jpg' ?>" class="mb-2 pre-img" width="100%">
                
                {{-- Input File --}}
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="previewFile()">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!} 
</div>
@include('layouts.scripts')
@endsection

