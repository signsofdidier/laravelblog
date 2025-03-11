@extends('layouts.backend')
@section('title')
    Create a Users
@endsection
@section('charts')
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div>
            @include('layouts.partials.form_error')
        </div>
        <form action="{{action('\App\Http\Controllers\UserController@store')}}" method="POST" enctype="multipart/form-data">
            @csrf {{--HEEL BELANGRIJK!!! MOET IK ELK FORMULIER--}}
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{old('name')}}"{{--old onthoud de input--}}
                >
                @error('name')
                    <p class="text-danger text-sm">{{$message}}</p>
                @enderror()
            </div>
            <div class="form-group mt-1">
                <label for="email">E-mail</label>
                <input
                    type="text"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{old('email')}}"{{--old onthoud de input--}}
                >
            </div>
            <div class="form-group mt-1">
                <label for="role_id">Select Role</label>
                <select class="form-select" name="role_id[]" id="role_id" multiple>
                    <option value="" disabled>Select Role (ctrl + click multiple)</option>
                    {{--foreach voor associatieve array--}}
                    @foreach($roles as $id=>$role)
                    <option value="{{$id}}">{{$role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-1">
                <label for="is_active">Select Status</label>
                <select class="form-select" name="is_active" id="is_active">
                    <option value="1" {{old('is_active' == 1 ? 'selected' : "")}}>Active</option>
                    <option value="0" {{old('is_active' == 0 ? 'selected' : "")}}>Not Active</option>
                </select>
            </div>
            <div class="form-group mt-1">
                <label for="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                >
            </div>
            <div class="form-group mt-1">
                <label for="photo_id">Image:</label>
                <input
                    type="file"
                    name="photo_id"
                    id="photo_id"
                    class="form-control"
                >
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>

@endsection
