@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >



    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Size </h5>
                    <a href="{{route('size.create')}}" class="btn btn-warning">Create</a>
                </div>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach ($sizes as $key=> $size)


                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$size->name}}</td>
                      <td>
                        <a href="{{route('size.delete',$size->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
