@extends('BackEnd.layout.master')
@section('content')
    <main id="main" class="main">

        <div class="container mt-2">

            <div class="row">
                <h3 class="mb-4" style="font-weight: bold">Product Create</h5>
                    <form action="{{ route('product.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="m-3">Product Name*</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ old('name') }}">
                                    <span class="input alert-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="m-3">Category*</label>
                                    <select class="form-select form-control" id="category" name="categories_id">
                                        <option>Select Category</option>
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
                                    <select class="form-select form-control" id="subcategory" name="subcategories_id">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="m-3">Child Categories(optinal)</label>
                                    <select class="form-select form-control" id="childcategory" name="childcategories_id">
                                        <option value="">Select Child-Categories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="m-3">Brand</label>
                                    <select class="form-select form-control" id="brand" name="brands_id">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="m-3">SKU</label>
                                    <input type="text" name="sku" class="form-control" placeholder="sku">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id " class="m-3">Regular Price*</label>
                                    <input type="number" id="name" class="form-control" name="regular_price"
                                        placeholder="Regular-Price" value="{{ old('regular_price') }} ">
                                    <span class="input alert-danger">
                                        @error('regular_price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id " class="m-3">Sale Price*</label>
                                    <input type="number" id="name" class="form-control" name="sale_price"
                                        placeholder="Sale-Price" value="{{ old('sale_price') }}">
                                    <span class="input alert-danger">
                                        @error('sale_price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id " class="m-3">Quantity *</label>
                                    <input type="text" id="name" class="form-control" name="quantity"
                                        placeholder="Quantity"value="{{ old('quantity') }}">
                                    <span class="input alert-danger">
                                        @error('quantity')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="m-3">Stock</label>
                                    <div class="select flex-grow">
                                        <select class=" form-control" name="stock_status">
                                            <option value="instock">inStock</option>
                                            <option value="out of stock">Out Of Stock</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="m-3">Featured</label>
                                    <div class="select flex-grow">
                                        <select class=" form-control" name="featured">
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
{{-- 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size" class="m-3">Size</label>
                                    <select class="form-select form-control" id="size" name="sizes_id">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size" class="m-3">Size</label>
                                    <select class="form-select form-control" id="size" name="sizes_id[]" multiple>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->name }}" {{ in_array($size->name, old('sizes_id', [])) ? 'selected' : '' }}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size" class="m-3">Color</label>
                                    <select class="form-select form-control" id="size" name="colors_id[]" multiple>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->name }}" {{ in_array($color->name, old('colors_id', [])) ? 'selected' : '' }}>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="m-3">Meta title</label>
                                    <textarea name="meta_title" id="" class="form-control" value="{{ old('meta_title') }}"></textarea>
                                    <span class="input alert-danger">
                                        @error('meta_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="m-3">Meta Description</label>
                                    <textarea name="meta_description" id="summernote1" value="{{ old('meta_description') }}"></textarea>
                                    <span class="input alert-danger">
                                        @error('meta_description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="" class="m-3">Image*</label>
                                    <span class="input alert-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="file" id="image" class="form-control" name="image"
                                        value="{{ old('image') }}">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gallery_image" class="m-3">Gallery Image*</label>
                                    <input type="file" class="form-control" name="gallery_image[]" multiple />
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
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryId = $(this).val();

                $('#subcategory').html('<option value="">Select Subcategory</option>');
                $('#childcategory').html('<option value="">Select Child Category</option>');

                if (categoryId) {
                    $.ajax({
                        url: "{{ route('get.subcategories') }}",
                        type: "GET",
                        data: {
                            category_id: categoryId
                        },
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#subcategory').on('change', function() {
                var subcategoryId = $(this).val();
                $('#childcategory').html('<option value="">Select Child Category</option>');

                if (subcategoryId) {
                    $.ajax({
                        url: "{{ route('get.childcategories') }}",
                        type: "GET",
                        data: {
                            subcategory_id: subcategoryId
                        },
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#childcategory').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        }
                    });
                }
            });

        });
    </script>


@endsection
