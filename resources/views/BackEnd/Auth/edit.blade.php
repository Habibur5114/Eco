@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h5><b>Edit Create</b></h5>
<div class="container mt-4">
    <div class="row">
        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Name*</label>
                        <input type="text" id="name"  class="form-control" name="name" placeholder="Name"  value="{{$user->name}}">
                        <input type="hidden" name="id"  value="{{$user->id}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="m-3">Email*</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="m-3 mt-4">Password*</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="{{$user->email}}" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm_password" class="m-3 mt-4">Confirm Password*</label>
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" value="{{$user->email}}" >
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image" class="m-3 mt-4">Image*</label>
                        <input type="file" id="image" class="form-control" name="image" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-3 mt-4">Status</label><br>
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success mt-5" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</main>
@endsection
