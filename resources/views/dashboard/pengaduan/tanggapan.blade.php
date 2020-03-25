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
			<div class="breadcrumb-item">
                 <a href="{{ route('riwayat.index') }}">Riwayat</a>
              </div>
              <div class="breadcrumb-item active">
                  Post
              </div>                       
            </div>
          </div>

          <div class="section-body">

			<x-card-lihat-tanggapan :pengaduan="$pengaduan" :tanggapan="$tanggapan"/>

          </div>
        </section>
      </div>

@endsection