@extends('BackEnd.layout.master')
@section('content')
    <main id="main" class="main">
        <h5>
            <b>
                @isset($brand)
                    Edit Brand
                @else
                    Brand Create
                @endisset


            </b>
        </h5>
        <div class="container mt-4">
            <div class="row">
                <form action="@isset($brand){{route('brand.update')}}@else{{route('brand.store') }}@endisset" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Name*</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                                    required value= "@isset($brand){{ $brand->name }}@endisset">
                                <input type="hidden" name="id"
                                    value ="@isset($brand){{ $brand->id }}@endisset">


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="m-3">Image*</label>
                                <input type="file" id="image" class="form-control" name="image" >
                                @if (isset($brand->image))
                                    <img src="{{ asset($brand->image) }}" alt=""
                                        style="width: 50px; height: 50px; border-radius: 60%;">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Meta title</label>
                                <textarea id="name" class="form-control" name="meta_title">{{ $brand->meta_title ?? '' }}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="m-3 mt-4">Status</label><br>
                                <label class="switch">
                                    <input type="checkbox" name="status" value="1" {{ isset($brand) && $brand->status ? 'checked' : '' }}>
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
