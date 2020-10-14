<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pengaduan Masyarakat &mdash; @yield('title_url')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/fontawesome/css/all.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/components.css') }}">
</head>

<body>

   @include('sweetalert::alert')
   @yield('content')

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('public/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('public/js/scripts.js') }}"></script>
  <script src="{{ asset('piblic/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>