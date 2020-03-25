<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4>Verifikasi & Validasi Pengaduan</h4>
            
            <div class="card-header-action ">
                 <form method="post" action="{{ route('verification.search') }}">
                     
                      @csrf
                        
                      <div class="input-group">
                         <input type="text" name="q" class="form-control" value="{{ old('q') }}" placeholder="Cari berdasarkan isi laporan..">
                          
                         <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>                                    
                          </div>
                        
                      </div>
                </form>                           
             </div>
            
         </div>
         
         @if($q != '')
               <div class="m-3">
                     {{ $q }}
               </div>
           @endif
         
         <div class="card-body">
            <a href="{{ route('validation.show') }}" class="btn btn-primary mb-3">
               Validasi Pengaduan <span class="badge badge-info">{{ $validasi }}</span>
            </a> <br>
		  <a href="{{ route('show.tolak') }}" class="btn btn-primary">
			Pengaduan Ditolak <span class="badge badge-info"> {{ $tolak }}</span>
		</a>
         </div>
      </div>
   </div>
</div>

<div class="row justify-content-center">

   @foreach($pengaduan as $row)
   <div class="col-md-4">
      <div class="card">
         <div class="card-header">
              <h4>Pengaduan</h4>
              <span class="badge badge-info">{{ $row->created_at->diffForHumans() }}</span>
         </div>
         <div class="card-body">
            <div class="chocolat-parent">
               <a href="{{ asset('files/'. $row->foto) }}" class="chocolat-image" title="Gambar Pengaduan">
                  <div class="text-center">
                     <img alt="Gambar tidak ditemukan" src="{{ asset('files/'. $row->foto) }}" class="img-fluid img-thumbnail mb-2">                  
                  </div>
               </a>
               <div class="text-muted text-center">
                    {{ $row->isi_laporan }}
               </div> 
            </div>
         </div>
         <div class="card-footer">
            <div class="dropdown">
               <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Verifikasi</a>
                        
                <div class="dropdown-menu">
                    <a href="{{ route('pengaduan.verification', $row->id) }}" class="dropdown-item has-icon"><i class="fas fa-check"></i>Verifikasi sekarang</a>
                    <a href="{{ route('verifikasi.tolak', $row->id) }}" class="dropdown-item has-icon"><i class="fas fa-times"></i>Tolak pengaduan</a>
               <div class="dropdown-divider"></div>
                   <a href="{{ route('verification.destroy', $row->id)}}" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>Hapus</a>
               </div>
            </div>
         </div>
      </div>
  </div>
  @endforeach

  @if(count($pengaduan) == 0)
      <div class="col-md-12">
          <x-alert type="warning">
             Tidak ada data laporan pengaduan yang belum di verifikasi
          </x-alert>
      </div>
   @endif

</div>

<!-- Pagination -->
@if($pengaduan->lastPage() != 1)
    <div class="btn-group float-right">
         <a href="{{ $pengaduan->previousPageUrl() }}" class="btn btn-primary">								
            <i class="fa fa-arrow-left"></i>						 
         </a>						 
         @for($i = 1; $i <= $pengaduan->lastPage(); $i++)								
             <a class="btn btn-primary {{ $i == $pengaduan->currentPage() ? 'active' : '' }}" href="{{ $pengaduan->url($i) }}">{{ $i }}</a>						 
         @endfor					 
             <a href="{{ $pengaduan->nextPageUrl() }}" class="btn btn-primary">								
                <i class="fa fa-arrow-right"></i>							
            </a>					 
     </div>
@endif	
<!-- End Pagination -->