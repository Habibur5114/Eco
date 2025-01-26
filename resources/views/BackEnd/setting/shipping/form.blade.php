@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h3><b>@isset($shippings)Edit Shipping Charge @else shiping Charge @endisset</b></h3>


<div class="container mt-4">
    <div class="row">
        <form action="@isset($shippings){{route('shipping.update')}}@else
       {{route('shipping.store')}} @endisset" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                    <div class="form-group">
                        <label for="name" class="m-3">Name</label>
                        <input type="text"  class="form-control" name="name" placeholder="Name" value="@isset($shippings){{$shippings->name}}@endisset" >
                        <input type="hidden" name="id" value="@isset($shippings){{$shippings->id}}@endisset">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="m-3 ">Status</label><br>
                            <label class="switch">
                                <input type="checkbox" name="status" value="1" @isset($shippings){{$shippings->status == 1 ? "checked":""}}@else checked  @endisset>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success " value="submit">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

</main>
@endsection
