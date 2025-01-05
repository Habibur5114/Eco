@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >



    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">User Manage</h5>
                    <a href="{{ route('admin.register') }}" class="btn btn-warning">Create</a>
                </div>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key=> $user )
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        @if($user->status ==1)
                        <a href="{{route('admin.status', $user->id)}}" style="width:77px" class="btn btn-success">Active</a>
                        @else
                        <a href="{{ route('admin.status', $user->id) }}" class="btn btn-danger" style="width:77px; font-size:14px !important;">Inactive</a>

                        @endif
                      </td>
                      <td>
                        <a href="{{route('admin.show',$user->id)}}"class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('admin.delete',$user->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
