<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
             <h4>Data Petugas</h4>
                    
             <div class="card-header-action">
                 <form method="post" action="{{ route('petugas.search') }}">
                     
                      @csrf
                        
                      <div class="input-group">
                         <input type="text" name="q" class="form-control" value="{{ old('q') }}" placeholder="Cari berdasarkan nama..">
                          
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
                  
              <a href="{{ route('petugas.create') }}" class="btn btn-primary m-3">
                  <i class="fa fa-user-plus"></i> Tambah Petugas
              </a>
                  
              <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                       <tr>
                          <th class="text-center">
                             NO
                          </th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Telepon</th>
                          <th>Level</th>
                          <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                  
                   @php
                   $i=1;
                   @endphp
                     
                   @foreach($petugas as $row)
                   <tr>
                       <td class="text-center">
                          {{ $i }}
                       </td>
                       <td>{{ $row->nama }}</td>
                       <td>{{ $row->username }}</td>
                       <td>{{ $row->telepon }}</td>
                       <td>
                          <span class="text-primary text-capitalize">
                             {{ $row->level }}
                          </span>
                       </td>
                       <td class="text-center">
                           <a href="{{ url('dashboard/petugas/'. $row->id .'/edit') }}" class="btn btn-primary my-1">
                             <i class="fa fa-edit"></i>
                           </a>
                                                           
                          <form method="post" action="{{ url('dashboard/petugas', $row->id) }}" id="destroy{{ $row->id }}">
                              
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
                  
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

@if(count($petugas) == 0)
	<x-alert type="warning">
		Data Petugas tidak ditemukan
	</x-alert>
@endif
            
<!-- Pagination -->
@if($petugas->lastPage() != 1)
    <div class="btn-group float-right">
         <a href="{{ $petugas->previousPageUrl() }}" class="btn btn-primary">								
            <i class="fa fa-arrow-left"></i>						 
         </a>						 
         @for($i = 1; $i <= $masyarakat->lastPage(); $i++)								
                <a class="btn btn-primary {{ $i == $petugas->currentPage() ? 'active' : '' }}" href="{{ $petugas->url($i) }}">{{ $i }}</a>						 
         @endfor					 
        <a href="{{ $petugas->nextPageUrl() }}" class="btn btn-primary">								
             <i class="fa fa-arrow-right"></i>							
         </a>					 
     </div>
@endif	
<!-- End Pagination -->

 <script>
function destroy(id,name){
     Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus data petugas atas nama "+ name +"?", 
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