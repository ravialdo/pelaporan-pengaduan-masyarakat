@extends('layouts.dashboard')

@section('title_url', 'Tambah Petugas')

@section('masyarakat', 'active')

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
                 <a href="{{ route('petugas.index') }}">Petugas</a>
              </div>
              <div class="breadcrumb-item active">
                  Tambah
              </div>
            </div>
          </div>

          <div class="section-body">
        
            <x-form-create-petugas/>
         
         </div>
        </section>
      </div>

@endsection