@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >



    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Product Manage</h5>
                    <a href="{{route('product.create')}}" class="btn btn-warning">Create</a>
                </div>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>regular_price</th>
                      <th>sale_price</th>
                      <th>quantity</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ( $products as $key=>  $product )
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->Category->name}}</td>
                      <td>

                        <img src="{{ asset($product->image) }}" alt="" style="width: 50px; height: 50px; border-radius: 60%;">


                      </td>
                      <td>{{$product->regular_price}}</td>
                      <td>{{$product->sale_price}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>
                        @if($product->status ==1)
                        <a href="{{route('product.status', $product->id)}}" style="width:77px" class="btn btn-success">Active</a>
                        @else
                        <a href="{{ route('product.status', $product->id) }}" class="btn btn-danger" style="width:77px; font-size:14px !important;">Inactive</a>

                        @endif
                      </td>
                      <td>
                        <a href="{{route('product.show',$product->id)}}"class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>

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
