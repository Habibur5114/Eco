@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
  
    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Brand Manage</h5>
                    <a href="{{ route('brand.create') }}" class="btn btn-warning">Create</a>
                </div>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $brands as $key=>  $brand )
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$brand->name}}</td>
                      <td>

                        <img src="{{ asset($brand->image) }}" alt="" style="width: 50px; height: 50px; border-radius: 60%;">


                      </td>
                      <td>
                        @if($brand->status ==1)
                        <a href="{{route('brand.status', $brand->id)}}" style="width:77px" class="btn btn-success">Active</a>
                        @else
                        <a href="{{ route('brand.status', $brand->id) }}" class="btn btn-danger" style="width:77px; font-size:14px !important;">Inactive</a>

                        @endif
                      </td>
                      <td>
                        <a href="{{route('brand.view',$brand->id)}}"class="btn btn-success">view</a>
                        <a href="{{route('brand.even',$brand->id)}}"class="btn btn-primary">Even</a>
                        <a href="{{route('brand.show',$brand->id)}}"class="btn btn-warning">Edit</a>
                        <a href="{{route('brand.delete',$brand->id)}}" class="btn btn-danger">Delete</a>


                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>

</main>
@endsection
