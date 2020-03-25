@extends('layouts.dashboard')

@section('title_url', 'Tambah Tanggapan')

@section('tanggapan', 'active')

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
                 <a href="{{ route('tanggapan.index') }}">Tanggapan</a>
              </div>
              <div class="breadcrumb-item active">
                  Post
              </div>
            </div>
          </div>

          <div class="section-body">
         
                  <x-post-tanggapan :pengaduan="$pengaduan" :tanggapan="$tanggapan"/>
                        
          </div>
        </section>
      </div>

@endsection