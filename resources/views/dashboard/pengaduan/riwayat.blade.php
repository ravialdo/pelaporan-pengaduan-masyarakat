@extends('layouts.dashboard')

@section('title_url', 'Riwayat Pengaduan')

@section('riwayat', 'active')

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
                  Riwayat
              </div>                       
            </div>
          </div>

          <div class="section-body">

			<x-card-riwayat :pengaduan="$pengaduan" :q="$kata"/>

          </div>
        </section>
      </div>

@endsection