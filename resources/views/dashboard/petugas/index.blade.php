@extends('layouts.dashboard')

@section('title_url', 'Petugas Index')

@section('petugas', 'active')

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
                  Petugas
              </div>
            </div>
          </div>

          <div class="section-body">          
         
            <x-table-petugas :q="$kata" :petugas="$petugas"/>
                        
          </div>
        </section>
      </div>

@endsection