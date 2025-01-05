@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h5><b>Categoies Create</b></h5>
<div class="container mt-4">
    <div class="row">
        <form action="{{ route('category.save') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Name*</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="m-3">Image*</label>
                        <input type="file" id="image" class="form-control" name="image"  required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Meta title</label>
                        <input type="text" id="name" class="form-control" name="meta_title">
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email" class="m-3">Meta Description</label>
                        <textarea name="meta_description" id="summernote3"></textarea>
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
