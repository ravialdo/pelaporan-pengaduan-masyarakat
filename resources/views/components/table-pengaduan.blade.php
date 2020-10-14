<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
             <h4>Data Pengaduan</h4>
                    
             <div class="card-header-action">
                 <form method="post" action="{{ route('pengaduan.search') }}">
                     
                      @csrf
                        
                      <div class="input-group">
                         <input type="text" name="q" class="form-control" value="{{ old('q') }}" placeholder="Cari berdasarkan nomor NIK..">
                          
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
                   
          <div class="card-body p-0">
                  
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th class="text-center">
                             NO
                         </th>
                          <th>NIK</th>
                          <th>Nama Pelapor</th>
                          <th>Isi Laporan</th>
                          <th class="text-center">
                              Foto
                          </th>
                          <th>Tanggal Pengaduan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                  
                   @php
                   $i=1;
                   @endphp
                     
                   @foreach($pengaduan as $row)
                   <tr>
                       <td class="text-center">
                          {{ $i }}
                       </td>
                       <td>{{ $row->nik }}</td>
                       <td>{{ $row->masyarakat->nama }}</td>
                       <td>{{ $row->isi_laporan }}</td>
                       <td class="text-center">
                           <img src="{{ asset('public/files/'. $row->foto)}}" class="img-thumbnail m-1" width="130" alt="Gambar tidak ditemukan">
                       </td>
                       <td>{{ $row->tanggal_pengaduan }}</td>
                       <td class="text-capitalize">
                          {{ $row->status == '0' ? 'menunggu' : $row->status }}
                       </td>
                       <td class="text-center">
                           <a href="{{ route('pengaduan.edit', $row->id) }}" class="btn btn-primary my-1">
                             <i class="fa fa-edit"></i>
                           </a>
                                                           
                          <form method="post" action="{{ url('dashboard/pengaduan', $row->id) }}" id="destroy{{ $row->id }}">
                              
                               @method('delete')
                               @csrf
                              
                              <button type="button" class="btn btn-danger mb-1" onclick="destroy({{ $row->id }},'{{ $row->masyarakat->nama }}')">
                                 <i class="fa fa-trash-alt"></i>
                              </button>
                              
                          </form>
                              
                      </td>
                   </tr>
                        
                  @php
                  $i++;
                  @endphp
                        
                  @endforeach
                  
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

@if(count($pengaduan) == 0)
	<x-alert type="warning">
		Data Pengaduan tidak ditemukan
	</x-alert>
@endif
            
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

 <script>
function destroy(id,name){
     Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus data pengaduan atas nama "+ name +"?", 
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