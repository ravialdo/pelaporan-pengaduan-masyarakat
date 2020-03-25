@extends('layouts.dashboard')

@section('laporkan-pengaduan', 'active')

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
                  Pengaduan
              </div>
            </div>
          </div>

          <div class="section-body">
         
             @if(session('status'))
                <x-alert type="success">
                  {{ session('status') }}
                </x-alert>    
             @endif
         
            <x-form-laporkan-pengaduan/>
                        
          </div>
        </section>
      </div>

@endsection