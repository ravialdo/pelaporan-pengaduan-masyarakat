@extends('layouts.dashboard')

@section('title_url', 'Tanggapan Index')

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
              <div class="breadcrumb-item active">
                  Tanggapan
              </div>
            </div>
          </div>

          <div class="section-body">
         
                <x-tab-tanggapan :tanggapan="$tanggapan" :pengaduan="$pengaduan"/>
                        
          </div>
        </section>
      </div>

@endsection