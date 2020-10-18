<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>APPM — Pelaporan Pengaduan Masyarakat!</title>

      <!-- General CSS Files -->
      <link rel="stylesheet" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/css/custom-bootstrap.css') }}">
      <link rel="stylesheet" href="{{ asset('public/fontawesome/css/all.css') }}">
      <link rel="stylesheet" href="{{ asset('public/aos/aos.css') }}">
</head>

<body class="mb-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom-gradient shadow">

            <div class="container">

                  <a class="navbar-brand" href="#">APPM<span class="text-primary">.</span></a>
                  <button class="navbar-toggler text-primary" onclick="button()" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" id="class"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                              <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i> Login <span class="sr-only">(current)</span></a>
                              </li>
                        </ul>
                  </div>
            </div>
      </nav>

      <div class="container section-content">
            <img src="{{ asset('public/svg/undraw_bookmarks_r6up.svg') }}" class="img-fluid" data-aos="fade-right">
            <div class="row mb-4">
                  <div class="col-lg-6 mt-4 mr-auto" data-aos="fade-up">
                        <h3>APPM Layanan Pengaduan Online Rakyat!</h3>
                        <p class="mb-4">
                              Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-radius shadow my-5" data-aos="fade-right">
                              Lapor Sekarang!
                        </a>
                  </div>
            </div>
      </div>

      <div class="container">
            <div class="row">
                  <div class="col-md-4 mb-5">
                        <div class="card shadow" data-aos="fade-up">
                              <div class="card-body">
                                    <div class="icon-card mx-auto">
                                          <i class="fa fa-sync"></i>
                                    </div>
                                    <p class="my-5 text-center">
                                          Melapor Sekarang lebih cepat.
                                    </p>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-4 mb-5">
                        <div class="card shadow" data-aos="fade-up">
                              <div class="card-body">
                                    <div class="icon-card mx-auto">
                                          <i class="fa fa-clock"></i>
                                    </div>
                                    <p class="my-5 text-center">
                                          Tidak perlu waktu yang lama.
                                    </p>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-4 mb-5">
                        <div class="card shadow" data-aos="fade-up">
                              <div class="card-body">
                                    <div class="icon-card mx-auto">
                                          <i class="fas fa-handshake"></i>
                                    </div>
                                    <p class="my-5 text-center">
                                          mulailah dengan layanan ini.
                                    </p>
                              </div>
                        </div>
                  </div>
            </div>

      </div>
      
      <div class="container-fluid text-center py-3">
            Design By <a href="https://ravialdo.github.io/">Ravialdo Imanda Putra</a>
      </div>


      <!-- General JS Scripts -->
      <script src="{{ asset('public/aos/aos.js') }}"></script>
      <script src="{{ asset('public/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('public/popper.js/dist/umd/popper.min.js') }}"></script>
      <script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}"></script>

      <script>
            AOS.init({
                  duration: 1000
            });

            function button() {
                  var getClass = $('#class').attr('class');
                  if (getClass == "fa fa-bars") {
                        $('#class').removeClass('fa-bars').addClass('fa-times');
                  } else {
                        $('#class').removeClass('fa-times').addClass('fa-bars');
                  }
            }

      </script>

</body>
</html>