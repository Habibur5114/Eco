@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h5><b>Categories Create</b></h5>
<div class="container mt-4">
    <div class="row">
        <form action="{{ route('childcategory.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Name*</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{$childcategories->name}}" required>
                        <input type="hidden"  class="form-control" name="id" value="{{$childcategories->id}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id" class="m-3">subCategory</label>
                        <select class="form-select form-control" name="subcategory_id" id="subcategory_id">
                            @foreach($subcategory as $subcategorys)
                            <option value="{{$subcategorys->id}}">
                                {{ $subcategorys->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Meta title</label>
                        <input type="text"  class="form-control" name="meta_title" value="{{$childcategories->meta_title}}"  >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="m-3">Image*</label>
                        <input type="file" id="image" class="form-control" name="image" > <br>
                        <img src="{{ asset($childcategories->image) }}" alt="" style="width: 50px; height: 50px; border-radius: 60%;">
                    </div>
                </div>

                <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="m-3">Meta Description</label>
                        <textarea name="meta_description" id="summernote" >{!!$childcategories->meta_description !!}</textarea>
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
