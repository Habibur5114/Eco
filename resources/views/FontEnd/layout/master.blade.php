<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('FontEnd/assets/favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('FontEnd/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">


        <style>

            .original {
              text-decoration: line-through;


            }

            nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    position: relative;
    display: inline-block;
    margin-right: 15px;
    font-size: 18px;
}

nav ul li ul {
    display: none;
    position: absolute;
    background: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 10px;
    list-style: none;
    margin: 0;
}

nav ul li:hover ul {
    display: block;
}





    .colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #f8bb86 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

.colored-toast.swal2-icon-question {
  background-color: #87adbd !important;
}

.colored-toast .swal2-title {
  color: white;
}

.colored-toast .swal2-close {
  color: white;
}

.colored-toast .swal2-html-container {
  color: white;
}


          </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('Fontend.index')}}">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                        @foreach ($categories as $category)
                            <li class="nav-item {{ $category->subcategories->count() > 0 ? 'dropdown' : '' }}">
                                <a href="{{route('Fontend.categorywise',$category->slug)}}"
                                   class="nav-link {{ $category->subcategories->count() > 0 ? 'dropdown-toggle' : '' }}"
                                   {{ $category->subcategories->count() > 0 ? 'data-bs-toggle=dropdown' : '' }}>
                                    {{ $category->name }}
                                </a>

                                @if($category->subcategories->count() > 0)
                                    <ul class="dropdown-menu">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li>
                                                <a href="#" class="dropdown-item">{{ $subcategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>


                    <form class="d-flex ms-auto">
                        <a href="{{ route('carts') }}" class="text-black text-decoration-none">
                            <i class="bi-cart-fill me-1"></i>
                            {{-- {{ Cart::getTotalQuantity() }} --}}
                        </a>
                    </form>


                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->



        <!-- Section-->
        @yield('content')

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

@if (session('success'))
<script>
Swal.fire({

    icon: "success",
    position: 'top-end',
    text: "{{ session('success') }}",
    timer: 1500
  });
</script>

@endif
