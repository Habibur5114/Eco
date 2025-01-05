<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E_commerce</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Favicons -->
  <link href="{{asset('BackEnd/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('BackEnd/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('BackEnd/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('BackEnd/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('BackEnd/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('BackEnd/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('BackEnd/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('BackEnd/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('BackEnd/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
  <!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('BackEnd/assets/css/style.css')}}" rel="stylesheet">
  <style>
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

  <!-- ======= Header ======= -->
  @include('BackEnd.include.navbar')
  <!-- ======= Sidebar ======= -->

  @include('BackEnd.include.sidebar')


    @yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" >
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('BackEnd/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('BackEnd/assets/vendor/php-email-form/validate.js')}}"></script>

  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  </script>
  <!-- Template Main JS File -->
  <script src="{{asset('BackEnd/assets/js/main.js')}}"></script>


  <script>
    $(document).ready(function() {
  $('#summernote').summernote();
  $('#summernote1').summernote();
  $('#summernote2').summernote();
  $('#summernote3').summernote();
  $('#summernote4').summernote();
  $('#summernote5').summernote();
  $('#summernote6').summernote();
  $('#summernote7').summernote();
  $('#summernote8').summernote();
});

</script>
</body>

</html>

@if (session('success'))
<script>
Swal.fire({

    icon: "success",
    text: "{{ session('success') }}",
    timer: 1500
  });
</script>

@endif













