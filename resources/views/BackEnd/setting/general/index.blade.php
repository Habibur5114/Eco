@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h3><b>General update</b></h3>
<div class="container mt-4">
    <div class="row">
        <form action="{{ route('general.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Name*</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{$generals->name}}">
                        <input type="hidden" name="id" value="{{$generals->id}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="m-3">Logo*</label>
                        <input type="file" id="logo" class="form-control" name="logo" >
                        <img src="{{ asset($generals->logo) }}" alt="" style="width: 50px; height: 50px; border-radius: 60%;">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="m-3">Favicon*</label>
                        <input type="file" id="favicon" class="form-control" name="favicon" >
                        <img src="{{ asset($generals->favicon) }}" alt="" style="width: 50px; height: 50px; border-radius: 60%;">
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
                        <input type="submit" class="btn btn-success mt-5" value="submit">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

</main>
@endsection
