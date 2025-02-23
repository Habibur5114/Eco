@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
  
    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Order Manage</h5>
               
                </div>

                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Name</th>
                      <th>phone</th>
                      <th>Amount</th>
                      <th>status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $key=> $orders)
                        
                   
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$orders->date}}</td>
                      <td>{{$orders->name }} <br>{{$orders->address}}</td>
                      <td>{{$orders->phone}}</td>
                      
                      <td>{{$orders->status}}</td>
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
