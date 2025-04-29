@extends('BackEnd.layout.master')
@section('content')
<main id="main" class="main" >
  
     <div class="container">
        <div class="row">

            <form action="{{route('even.store')}}" method="POST">
            @csrf
           <div class="form-group">
            <label class="m-2"> Name</label>
                <input type="text" name="even_name" class="form-control">  
           </div>

           <div class="form-group">
            <input type="submit" class="btn btn-success" value="save">  
           </div>

        </form>
        </div>
     </div>

</main>
@endsection
