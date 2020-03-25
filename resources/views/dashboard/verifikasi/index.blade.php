@extends('layouts.dashboard')

@section('title_url', 'Verifikasi & Validasi')

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
              <div class="breadcrumb-item active">
                  Verifikasi
              </div>
            </div>
          </div>

          <div class="section-body">
         
                  <x-card :q="$kata" :tolak="$tolak" :pengaduan="$pengaduan" :validasi="$count_validasi"/>
                        
          </div>
        </section>
      </div>

@endsection