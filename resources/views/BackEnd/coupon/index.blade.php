@extends('BackEnd.layout.master')
@section('content')
    <main id="main" class="main">
        <h5>
            <b>
                @isset($coupon)
                    Edit Coupon
                    @else       
                    Create Coupon
                @endisset
            </b>
        </h5>
        <div class="container mt-4">
            <div class="row">
                <form action="@isset($coupon){{route('coupon.update')}}@else{{route('coupon.store')}}@endisset" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Coupon Name</label>
                                <input type="text" id="name" class="form-control" name="coupon_code" value="@isset($coupon){{$coupon->name}}    
                                @endisset" placeholder="Name"> 
                                 <input type="hidden" name="id" value="@isset($coupon)
                                     {{$coupon->id}}
                                 @endisset">  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Coupon Type</label>
                                <div class="select flex-grow">
                                    <select class=" form-control" name="type">
                                        <option value="">Select coupon</option>
                                        <option value="fixed" {{ isset($coupon) && $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                        <option value="percent" {{ isset($coupon) && $coupon->type == 'percent' ? 'selected' : '' }}>Percent</option>
                                    </select>
                                </div>   
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Value</label>
                                <input type="text" id="name" class="form-control" name="value" placeholder="value"value=" @isset($coupon){{$coupon->value}}@endisset">   
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="m-3">Card Value</label>
                                <input type="text" id="name" class="form-control" name="card_value" placeholder="value" value="@isset($coupon){{$coupon->card_value}}@endisset" >   
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expiry_date" class="m-3">Expiry Date</label>
                                <input type="date" id="expiry_date" class="form-control" name="expiry_date" 
                                       value="{{ isset($coupon) && $coupon->expiry_date ? date('Y-m-d', strtotime($coupon->expiry_date)) : '' }}">   
                            </div>
                        </div>
                 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="m-3 mt-4">Status</label><br>
                                <label class="switch">
                                    <input type="checkbox" name="status" value="1" {{ isset($coupon) && $coupon->status ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
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
