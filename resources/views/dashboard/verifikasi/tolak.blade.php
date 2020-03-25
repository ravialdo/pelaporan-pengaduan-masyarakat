@extends('layouts.dashboard')

@section('title_url', 'Tolak Pengaduan')

@section('verifikasi.validasi', 'active')

@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">
                 <a href="{{ url('dashboard') }}">Dashboard</a>
              </div>
			<div class="breadcrumb-item">
                 <a href="{{ route('verification.index') }}">Verifikasi</a>
              </div>
              <div class="breadcrumb-item active">
                  Tolak
              </div>
            </div>
          </div>

          <div class="section-body">
         
                  <x-card-tolak :q="$kata" :pengaduan="$pengaduan"/>
                        
          </div>
        </section>
      </div>

@endsection