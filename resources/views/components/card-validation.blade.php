<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4>Verifikasi & Validasi Pengaduan</h4>
            
            <div class="card-header-action ">
                 <form method="post" action="{{ route('validation.search') }}">
                     
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
               <a href="{{ asset('public/files/'. $row->foto) }}" class="chocolat-image" title="Gambar Pengaduan">
                  <div class="text-center">
                     <img alt="Gambar tidak ditemukan" src="{{ asset('public/files/'. $row->foto) }}" class="img-fluid img-thumbnail mb-2">                  
                  </div>
               </a>
               <div class="text-muted text-center">
                    {{ $row->isi_laporan }}
               </div> 
            </div>
         </div>
         <div class="card-footer">
            <a href="{{ route('pengaduan.validation', $row->id) }}" class="btn btn-success">
               <i class="fa fa-check-circle"></i> Validasi
           </a>
       </div>
      </div>
  </div>
  @endforeach

   @if(count($pengaduan) == 0)
      <div class="col-md-12">
          <x-alert type="warning">
             Tidak ada data laporan pengaduan yang belum di validasi
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
