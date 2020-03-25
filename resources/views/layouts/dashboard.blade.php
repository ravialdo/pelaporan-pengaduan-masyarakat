<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pengaduan Masyarakat - @yield('title_url')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
</head>

<body>

@include('sweetalert::alert')

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="search-element">
            
            <div class="search-backdrop"></div>
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle">

            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              
              
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifikasi
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
			
               @if(session('nik') == true)
	
			@php
			$notifikasi = \App\Pengaduan::where(
			   	'nik', Session::get('nik')
			 )->get();
			@endphp
	
			@foreach($notifikasi as $notif)
	
		      @php
	           $data = \App\Tanggapan::where('id_pengaduan', $notif->id)->orderBy('id', 'desc')->get();
		      @endphp
				
		       @foreach($data as $key)
		
		       @if($key->id_petugas != null)
		           
                <a href="{{ route('riwayat.show', $key->id_pengaduan)}}" class="dropdown-item">
								
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
				
                  <div class="dropdown-item-desc">
				 {{ $key->petugas->nama }} <br>
				  {{ $key->tanggapan }}
                    <div class="time">{{ $key->created_at->diffForHumans() }}</div>
                  </div>
			
                </a> 

               @endif
                 
			@endforeach
			
			@endforeach
			
               @endif
				
			</div>
			<div class="dropdown-footer text-center">
                 <i class="fas fa-chevron-circle-down text-info"></i>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ session('nama') }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              
              <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ url('dashboard') }}">Pengaduan Masyarakat</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('dashboard') }}">PM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
			
			<li class="@yield('dashboard')">
                 <a class="nav-link active" href="{{ url('dashboard') }}">
                    <i class="fas fa-dashboard"></i> <span>Dashboard</span>
                  </a>
              </li>
		     @if(session('level') == 'admin')
               <li class="@yield('masyarakat')">
                 <a class="nav-link active" href="{{ route('masyarakat.index') }}">
                    <i class="fas fa-users"></i> <span>Data Masyarakat</span>
                  </a>
              </li>
             <li class="@yield('petugas')">
                 <a class="nav-link" href="{{ route('petugas.index') }}">
                    <i class="fa fa-user-friends"></i> <span>Data Petugas</span>
                  </a>
              </li>
		    @endif
		    @if(session('nik') == true)
             <li class="@yield('laporkan-pengaduan')">
                 <a class="nav-link" href="{{ route('laporkan-pengaduan.index') }}">
                    <i class="fas fa-edit"></i> <span>Laporkan Pengaduan</span>
                  </a>
              </li>
			<li class="@yield('riwayat')">
                 <a class="nav-link" href="{{ route('riwayat.index') }}">
                    <i class="fas fa-history"></i> <span>Riwayat Pengaduan</span>
                  </a>
              </li>
              @endif
		    @if(session('level') == 'admin')
              <li class="@yield('pengaduan')">
                 <a class="nav-link" href="{{ route('pengaduan.index') }}">
                    <i class="fas fa-table"></i> <span>Data Pengaduan</span>
                  </a>
              </li>
	        @endif
		   @if(session('level') == 'petugas' || session('level') == 'admin')
             <li class="@yield('verifikasi.validasi')">
                 <a class="nav-link" href="{{ route('verification.index') }}">
                    <i class="fas fa-check"></i> <span>Verifikasi dan Validasi</span>
                  </a>
              </li>
             <li class="@yield('tanggapan')">
                 <a class="nav-link" href="{{ route('tanggapan.index') }}">
                    <i class="fas fa-comment"></i> <span>Memberikan Tanggapan</span>
                  </a>
              </li>
		   @endif
		   @if(session('level') == 'admin')
             <li class="@yield('laporan')">
                 <a class="nav-link" href="{{ route('laporan.index') }}">
                    <i class="fas fa-file-alt"></i> <span>Generate Laporan</span>
                  </a>
              </li>                                             
             @endif
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            </div>
        </aside>
      </div>

      @yield('content')
      
      <footer class="main-footer">
        <div class="footer-left">
          <div class="bullet"></div> Backend By <a href="https://github.com/ravialdo/">Ravialdo Imanda Putra</a>
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
  <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/components-chat-box.js') }}"></script>

</body>
</html>
