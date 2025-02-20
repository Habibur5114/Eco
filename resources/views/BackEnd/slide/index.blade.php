@extends('BackEnd.layout.master')
@section('content')
    <main id="main" class="main">
        <h5>
            <b>
                @isset($slide)
                    Edit slide
                @else
                    slide Create
                @endisset


            </b>
        </h5>
        <div class="container mt-4">
            <div class="row">
                <form action="@isset($slide){{route('slide.update')}}@else{{route('slide.store') }}@endisset" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">title*</label>
                                <input type="text" id="name" class="form-control" name="title" placeholder="Name"
                                    required value= "@isset($slide){{ $slide->title }}@endisset">
                                <input type="hidden" name="id"
                                    value ="@isset($slide){{ $slide->id }}@endisset">


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="m-3">Image*</label>
                                <input type="file" id="image" class="form-control" name="image" >
                                @if (isset($slide->image))
                                    <img src="{{ asset($slide->image) }}" alt=""
                                        style="width: 50px; height: 50px; border-radius: 60%;">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">short title</label>
                                <textarea id="name" class="form-control" name="short_des">{{ $slide->meta_title ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Link</label>
                                <input type="url" class="form-control" name="link" placeholder="URL"
                                       value="{{ $slide->link ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="m-3 mt-4">Status</label><br>
                                <label class="switch">
                                    <input type="checkbox" name="status" value="1" {{ isset($slide) && $slide->status ? 'checked' : '' }}>
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
