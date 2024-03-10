@extends('layouts.admin')
@push('title')
    <title>user edit</title>
@endpush
@section('content')

<h1>Edit user</h1>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                User Edit FORM
            </div>
            <div class="panel-body">
                <form role="form" action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        <p class="help-block" style="color:red;">
                            @error('name')
                                {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input class="form-control" type="text" name="email" value="{{$user->email}}">
                        <p class="help-block" style="color:red;">
                            @error('email')
                                {{$message}}
                            @enderror
                        </p>
                    </div>
            
            
            <div class="form-group">
                <label>Enter Password</label>
                <input class="form-control" type="password" name="password" value="{{old('password')}}">
                <p class="help-block" style="color:red;">
                    @error('password')
                        {{$message}}
                    @enderror
                </p>
            </div>
            <div class="form-group">
                <label>Re enter Password </label>
                <input class="form-control" type="password" name ="confirm_password" value="{{old('confirm_password')}}">
                <p class="help-block" style="color:red;">
                    @error('confirm_password')
                        {{$message}}
                    @enderror
                </p>
            </div>
            <button type="submit" class="btn btn-info">update </button>

            </form>
        </div>
    </div>
</div>
@endsection