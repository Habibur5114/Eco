@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h3><b> size</b></h3>


<div class="container mt-4">
    <div class="row">
        <form action="{{route('size.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Name</label>
                        <input type="text"  class="form-control" name="name" placeholder="Name">
                        <input type="hidden" name="id" value="{{ isset($sizes) ? $sizes->id : '' }}">
                        
                    </div>   
            </div>   
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success " value="submit">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

</main>
@endsection
