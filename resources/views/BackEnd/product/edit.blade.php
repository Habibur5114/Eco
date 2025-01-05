@extends('BackEnd.layout.master')
@section('content')

<main id="main" class="main" >

    <div class="container mt-2">

        <div class="row">
            <h3 class="mb-4" style="font-weight: bold">Product Edit</h5>
            <form action="{{route('product.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="m-3">Product Name*</label>
                            <input type="text" id="name" class="form-control" value="{{$product->name}}" name="name" placeholder="Name" value="{{old('name')}}">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <span class="input alert-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id" class="m-3">Category*</label>

                            <select  class="form-select form-control"   id="category" name="categories_id" >
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" class="m-3">SubCategories(optional)</label>
                            <select  class="form-select form-control" id="subcategory" name="subcategories_id">
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id" class="m-3">Child Categories(optinal)</label>
                            <select class="form-select form-control" id="childcategory" name="childcategories_id" >
                                <option value="">Select Child-Categories</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id " class="m-3">Regular Price*</label>
                            <input type="number" id="name" class="form-control" name="regular_price" value="{{$product->regular_price}}" placeholder="Regular-Price" value="{{old('regular_price')}}" >
                            <span class="input alert-danger">@error('regular_price'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id " class="m-3">Sale Price*</label>
                            <input type="number" id="name" class="form-control" name="sale_price"c value="{{$product->sale_price}}" placeholder="Sale-Price" value="{{old('sale_price')}}">
                            <span class="input alert-danger">@error('sale_price'){{$message}}@enderror</span>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity" class="m-3">Quantity *</label>
                            <input type="number" id="quantity" class="form-control" name="quantity"value="{{ old('quantity', $product->quantity) }}"  placeholder="Quantity" >
                            <span class="input alert-danger">
                                @error('quantity'){{ $message }}@enderror
                            </span>
                        </div>
                    </div>








                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="m-3">Meta title</label>
                          <textarea name="meta_title" id="" class="form-control"  value="{{old('meta_title')}}">{!!$product->meta_title!!}</textarea>
                          <span class="input alert-danger">@error('meta_title'){{$message}}@enderror</span>
                        </div>
                    </div>
                </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meta_description" class="m-3">Meta Description</label>
                        <textarea  name="meta_description" id="summernote1"  class="form-control">{{ old('meta_description', $product->meta_description) }}</textarea>
                        <span class="input alert-danger">
                            @error('meta_description'){{ $message }}@enderror
                        </span>
                    </div>
                </div>
            </div>




            <div class="col-md-5">
                <div class="form-group">
                    <label for="" class="m-3">Image*</label>
                    <span class="input alert-danger">@error('image'){{$message}}@enderror</span>
                    <input type="file" id="image" class="form-control" name="image" value="{{old('image')}}">

                </div>
            </div>

            <div class="col-md-1">
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
                        <input type="submit" class="btn btn-success mt-5" value="Add-Product">
                    </div>
                </div>

               </div>



            </form>
        </div>
    </div>


</main>


<script>
    $(document).ready(function () {
         $('#category').on('change', function () {
             var categoryId = $(this).val();

             $('#subcategory').html('<option value="">Select Subcategory</option>');
             $('#childcategory').html('<option value="">Select Child Category</option>');

             if (categoryId) {
                 $.ajax({
                     url: "{{ route('get.subcategories') }}",
                     type: "GET",
                     data: { category_id: categoryId },
                     success: function (data) {
                         $.each(data, function (key, value) {
                             $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                         });
                     }
                 });
             }
         });

         $('#subcategory').on('change', function () {
             var subcategoryId = $(this).val();
             $('#childcategory').html('<option value="">Select Child Category</option>');

             if (subcategoryId) {
                 $.ajax({
                     url: "{{ route('get.childcategories') }}",
                     type: "GET",
                     data: { subcategory_id: subcategoryId },
                     success: function (data) {
                         $.each(data, function (key, value) {
                             $('#childcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                         });
                     }
                 });
             }
         });

     });
 </script>

@endsection




