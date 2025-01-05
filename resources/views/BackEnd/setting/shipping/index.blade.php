@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
<h5><b>Contact Create</b></h5>
<div class="container mt-4">
    <div class="row">
        <form action="{{ route('contact.save') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Hotline*</label>
                        <input type="text"  class="form-control" name="hotline" placeholder="Hotline" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Hotmail*</label>
                        <input type="text"  class="form-control" name="hotmail" placeholder="Hotmail" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">phone*</label>
                        <input type="text"  class="form-control" name="phone" placeholder="phone" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Email*</label>
                        <input type="email"  class="form-control" name="email" placeholder="Email" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Address*</label>
                        <input type="text"  class="form-control" name="address" placeholder="address" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="m-3">Maplink*</label>
                        <input type="text"  class="form-control" name="maplink" placeholder="maplink" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="m-3 mt-4">Status</label><br>
                        <label class="switch">
                            <input type="checkbox" name="status" value="1" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

            </div>



            <div class="row">
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
