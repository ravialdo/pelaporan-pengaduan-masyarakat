<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4>Edit Tanggapan</h4>
			</div>
			<div class="card-body">
				<form method="post" action="{{ route('tanggapan.update', $tanggapan->id) }}">
				
					@method('put')
					@csrf
					
					<div class="form-group">
						<label>Tanggapan</label>
						<textarea rows="5" class="form-control" name="tanggapan">{{ $tanggapan->tanggapan }}</textarea>
					</div>
			</div>
			<div class="card-footer text-right">
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-edit"></i> Edit
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
	     <div class="card">
  <div class="card-header">
     <h4>Pengaduan</h4>
  </div>
  <div class="card-body">
    <ul class="nav nav-pills" id="myTab3" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#laporan" role="tab" aria-controls="home" aria-selected="true">Laporan</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#pelapor" role="tab" aria-controls="profile" aria-selected="false">Pelapor</a>
     </li>
  </ul>
  <div class="tab-content" id="myTabContent2">
        <div class="tab-pane fade show active" role="tabpanel" id="laporan" aria-labelledby="home-tab3">
              <div class="chocolat-parent">
               <a href="{{ asset('files/'. $tanggapan->pengaduan->foto) }}" class="chocolat-image" title="Gambar Pengaduan">
                  <div class="text-center">
                     <img alt="Gambar tidak ditemukan" src="{{ asset('files/'. $tanggapan->pengaduan->foto) }}" class="img-fluid img-thumbnail mb-2">                  
                  </div>
               </a>
               <div class="text-muted text-center">
                    {{ $tanggapan->pengaduan->isi_laporan }}
               </div> 
            </div>
        </div>
        <div class="tab-pane fade" role="tabpanel" id="pelapor" aria-labelledby="profile-tab3">
           <ul class="list-group list-group-flush">
              <li class="list-group-item">NIK : <br> {{ $tanggapan->pengaduan->masyarakat->nik }}</li>
              <li class="list-group-item">Nama : <br> {{ $tanggapan->pengaduan->masyarakat->nama }}</li>
             <li class="list-group-item">Username : <br> {{ $tanggapan->pengaduan->masyarakat->username }}</li>
             <li class="list-group-item">Nomor Telepon : <br> {{ $tanggapan->pengaduan->masyarakat->telepon }}</li>
           </ul>
        </div>
      </div>
   </div>
</div>
	</div>
</div>