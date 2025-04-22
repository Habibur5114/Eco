@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >



    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Color </h5>
                    <a href="{{route('color.create')}}" class="btn btn-warning">Create</a>
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
                @foreach ($colors as $key=> $color)


                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$color->name}}</td>
                      <td>
                        <a href="{{route('color.delete',$color->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
