@extends('layouts.dashboard')

@section('title_url', 'Masyarakat Index')

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
              <div class="breadcrumb-item active">
                  Masyarakat
              </div>
            </div>
          </div>

          <div class="section-body">
         
         
         
            <x-table-masyarakat :q="$kata">
            
                      @php
                         $i=1;
                      @endphp
                     
                      @foreach($masyarakat as $row)
                          <tr>
                            <td class="text-center">
                             {{ $i }}
                            </td>
                           <td>{{ $row->nik }}</td>
                           <td>{{ $row->nama }}</td>
                           <td>{{ $row->username }}</td>
                           <td>{{ $row->telepon }}</td>
                            <td class="text-center">
                              <a href="{{ url('dashboard/masyarakat/'. $row->id .'/edit') }}" class="btn btn-primary my-1">
                                 <i class="fa fa-edit"></i>
                              </a>
                                                           
                              <form method="post" action="{{ url('dashboard/masyarakat', $row->id) }}" id="destroy{{ $row->id }}">
                              
                                 @method('delete')
                                 @csrf
                              
                                 <button type="button" class="btn btn-danger mb-1" onclick="destroy({{ $row->id }},'{{ $row->nama }}')">
                                    <i class="fa fa-trash-alt"></i>
                                 </button>
                              
                              </form>
                              
                            </td>
                          </tr>
                        
                        @php
                           $i++;
                        @endphp
                        
                        @endforeach
                        
            </x-table-masyarakat>

		 @if(count($masyarakat) == 0)
			<x-alert type="warning">
				Data Masyarakat tidak ditemukan
			</x-alert>
		@endif
            
             <!-- Pagination -->
                        @if($masyarakat->lastPage() != 1)
                        <div class="btn-group float-right">
                           <a href="{{ $masyarakat->previousPageUrl() }}" class="btn btn-primary">								
                              <i class="fa fa-arrow-left"></i>						 
                           </a>						 
                              @for($i = 1; $i <= $masyarakat->lastPage(); $i++)								
                                   <a class="btn btn-primary {{ $i == $masyarakat->currentPage() ? 'active' : '' }}" href="{{ $masyarakat->url($i) }}">{{ $i }}</a>						 
                              @endfor					 
                                   <a href="{{ $masyarakat->nextPageUrl() }}" class="btn btn-primary">								
                                       <i class="fa fa-arrow-right"></i>							
                                  </a>					 
                           </div>
                           @endif	
                           <!-- End Pagination -->
                   
          </div>
        </section>
      </div>

<script>

function destroy(id,name){
     Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus data masyarakat atas nama "+ name +"?", 
        icon: 'warning', 
        showCancelButton: true, 
        confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', 
        confirmButtonText: 'Yakin', 
        cancelButtonText: 'Batal'
     }).then((result) => {
            if (result.value){                      
                  $('#destroy'+id).submit();
                }
         })
}

</script>

@endsection