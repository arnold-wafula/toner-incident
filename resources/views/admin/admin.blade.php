@extends('layouts.app')
@include('layouts.nav-admin')
@section('content')

<div class="container mt-5">
    <form method="POST" action="" class="col-md-6 mx-auto bg-white p-4 rounded">
        @csrf
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="john"/>
            </div>

             <div class="col-md-4">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="doe"/>
            </div>

            <div class="col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="john.doe@groupmfi.com"/>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <label for="role_id">Role</label>
                <select name="role_id" class="form-control">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="department_id">Role</label>
                <select name="department_id" class="form-control">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="*******">
            </div>
        </div>

        <div class="row mt-4">
        <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-block">Create User</button>
            </div>
        </div>
    </form>
</div>
@endsection