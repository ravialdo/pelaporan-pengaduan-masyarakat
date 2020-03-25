@extends('layouts.dashboard')

@section('title_url', 'Edit Masyarakat')

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
                 <a href="{{ url('dashboard/masyarakat') }}">Masyarakat</a>
              </div>
              <div class="breadcrumb-item active">
                  Edit
              </div>
            </div>
          </div>

          <div class="section-body">
        
            <x-from-update-masyarakat 
               :id="$masyarakat->id" 
               :nik="$masyarakat->nik" 
               :nama="$masyarakat->nama" 
               :username="$masyarakat->username" 
               :telepon="$masyarakat->telepon"/>
         
         </div>
        </section>
      </div>

@endsection