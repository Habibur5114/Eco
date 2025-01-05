@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >



    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Childcategory Manage</h5>
                    <a href="{{ route('childcategory.create') }}" class="btn btn-warning">Create</a>
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
                    @foreach ( $childcategorys as $key=>  $childcategory )
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$childcategory->name}}</td>
                      <td>

                        <img src="{{ asset($childcategory->image) }}" alt="" style="width: 50px; height: 50px; border-radius: 60%;">


                      </td>
                      <td>
                        @if($childcategory->status ==1)
                        <a href="{{route('childcategory.status', $childcategory->id)}}" style="width:77px" class="btn btn-success">Active</a>
                        @else
                        <a href="{{ route('childcategory.status', $childcategory->id) }}" class="btn btn-danger" style="width:77px; font-size:14px !important;">Inactive</a>

                        @endif
                      </td>
                      <td>
                        <a href="{{route('childcategory.show',$childcategory->id)}}"class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>

              </div>
            </div>

          </div>
        </div>
      </section>

</main>
@endsection
