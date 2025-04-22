@extends('BackEnd.layout.master')
@section('content')

<main id="main" class="main" >

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-md-2">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <p class="card-title text-center" > Product</p>
                    <h6 class="text-center">{{$totalProducts}}</h6>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <p class="card-title text-center" >Order</p>
                    <h6 class="text-center">{{$todayOrders}}</h6>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <p class="card-title text-center">totall Order</p>
                    <h6 class="text-center">{{$totalOrders}}</h6>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection
