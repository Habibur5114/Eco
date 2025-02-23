@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >



    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">shiping Manage </h5>
                    <a href="{{route('shipping.create')}}" class="btn btn-warning">Create</a>
                </div>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Area-Name</th>
                      <th>Charge</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach ($shippings as $key=> $shipping)


                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$shipping->name}}</td>
                      <td>{{$shipping->charge}}</td>

                      <td>
                       @if ($shipping->status == 1)
                       <a href="{{route('shipping.status', $shipping->id)}}" style="width:77px" class="btn btn-success">Active</a>
                       @else
                        <a href="{{route('shipping.status', $shipping->id)}}" class="btn btn-danger" style="width:77px; font-size:14px !important;">Inactive</a>

                       @endif

                      </td>
                      <td>
                        <a href="{{route('shipping.edit',$shipping->id)}}"class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('shipping.destroy',$shipping->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>

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
