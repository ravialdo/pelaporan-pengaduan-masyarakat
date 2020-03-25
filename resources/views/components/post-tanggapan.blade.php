<div class="row">
	<div class="col-md-8">
		 <div class="card">
         		<div class="card-header text-center">
			<h4>Laporan Pengaduan</h4>
         </div>
         <div class="card-body">  
			 <div class="chocolat-parent mb-1">
               <a href="{{ asset('files/'. $pengaduan->foto) }}" class="chocolat-image" title="Gambar Pengaduan">
                  <div class="text-center">
                     <img alt="Gambar tidak ditemukan" src="{{ asset('files/'. $pengaduan->foto) }}" class="img-fluid img-thumbnail mb-2">                  
                  </div>
               </a>
		</div>
			<b class="text-primary">
				<i class="fas fa-user"></i>
				    {{ $pengaduan->masyarakat->username }}
				<i class="bullet"></i> 
				    <span class="text-uppercase">{{ $pengaduan->created_at->diffForHumans() }}</span>
			</b>
               <div class="text-dark">
                    {{ $pengaduan->isi_laporan }}
               </div>
			
			@foreach($tanggapan as $row)
			<hr>
			
			<div class="mt-1">
				<b class="text-primary text-capitalize">		
					@if($row->id_petugas == null)
						<i class="fas fa-user"></i> {{ $row->masyarakat->username }}
					@else
						<i class="fas fa-user-tie"></i> {{ $row->petugas->username }}
					@endif
				     <span class="float-right">{{ $row->tanggal_tanggapan->format('d M Y H:i') }}</span>
				</b>
				<div class="text-dark">{{ $row->tanggapan }}</div>
												
				<a href="{{ route('tanggapan.edit', $row->id) }}" class="btn btn-primary float-right ml-1 my-1">
					<i class="fas fa-edit"></i>
				</a>
				
				<form method="post" action="{{ route('tanggapan.destroy', $row->id) }}" id="destroy{{ $row->id }}" class="text-right my-1">
				
					@method('delete')
					@csrf
					
					<button type="button" class="btn btn-danger" onclick="destroy({{ $row->id }})">
						<i class="fas fa-trash"></i>
					</button>
				</form>
				
			</div>
			@endforeach
			
         </div>
         <div class="card-footer">
            <form method="post" action="{{ route('tanggapan.store') }}">
			@csrf
			
			<input type="hidden" name="id" value="{{ $pengaduan->id }}">
			
			<div class="form-group">
                      <div class="input-group">
                        <textarea name="tanggapan" class="form-control" placeholder="Ketikan tanggapan anda.." {{ session('level') == 'admin' ? 'readonly' : '' }}></textarea>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="{{ session('level') == 'admin' ? 'button' : 'submit' }}">
						<i class="far fa-paper-plane"></i>
					</button>
                        </div>
                      </div>
                    </div>
		</form>
      </div>
  </div>
	</div>
	<div class="col-md-4">
		<div class="card">
        <div class="card-header">
           <h4>Detail Pelapor</h1>
        </div>
        <div class="card-body">
            <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">NIK : <br> {{ $pengaduan->masyarakat->nik }}</li>
                      <li class="list-group-item">Nama : <br> {{ $pengaduan->masyarakat->nama }}</li>
                      <li class="list-group-item">Username : <br> {{ $pengaduan->masyarakat->username }}</li>
                      <li class="list-group-item">Nomor Telepon : <br> {{ $pengaduan->masyarakat->telepon }}</li>
                    </ul>
                  </div>
        </div>
        <div class="card-footer">
        </div>
   </div>
 </div>
	</div>
</div>

<script>
function destroy(id){
     Swal.fire({
        title: 'PERINGATAN!',
        text: "Yakin ingin menghapus tanggapan ini?", 
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