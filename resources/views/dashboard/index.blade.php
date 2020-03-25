@extends('layouts.dashboard')

@section('title_url', 'Dashboard')

@section('dashboard', 'active')

@section('content')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active">
                 Dashboard
              </div>                       
            </div>
          </div>

          <div class="section-body">

			<x-card-home/>
			
          </div>
        </section>
      </div>

@endsection