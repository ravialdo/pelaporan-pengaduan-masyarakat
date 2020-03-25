@extends('layouts.dashboard')

@section('title_url', 'Edit Tanggapan')

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
                  Edit
              </div>
            </div>
          </div>

          <div class="section-body">
         
                <x-form-edit-tanggapan :tanggapan="$tanggapan"/>
                        
          </div>
        </section>
      </div>

@endsection