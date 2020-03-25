<div class="row justify-content-center">
@foreach($pengaduan as $row)
<div class="col-md-4">

<div class="card">
  <div class="card-header">
     <h4>Pengaduan</h4> <span class="badge badge-{{ $row->status == 'proses' ? 'primary' : 'success' }} ml-auto">{{ $row->status == 'proses' ? 'Sedang di Proses' : 'Selesai' }}</span>
  </div>
  <div class="card-body">
    <ul class="nav nav-pills" id="myTab3" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#laporan{{ $row->id }}" role="tab" aria-controls="home" aria-selected="true">Laporan</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#pelapor{{ $row->id }}" role="tab" aria-controls="profile" aria-selected="false">Pelapor</a>
     </li>
  </ul>
  <div class="tab-content" id="myTabContent2">
        <div class="tab-pane fade show active" role="tabpanel" id="laporan{{ $row->id }}" aria-labelledby="home-tab3">
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
        <div class="tab-pane fade" role="tabpanel" id="pelapor{{ $row->id }}" aria-labelledby="profile-tab3">
           <ul class="list-group list-group-flush">
              <li class="list-group-item">NIK : <br> {{ $row->nik }}</li>
              <li class="list-group-item">Nama : <br> {{ $row->masyarakat->nama }}</li>
             <li class="list-group-item">Username : <br> {{ $row->masyarakat->username }}</li>
             <li class="list-group-item">Nomor Telepon : <br> {{ $row->masyarakat->telepon }}</li>
           </ul>
        </div>
      </div>
      <a href="{{ route('tanggapan.show', $row->id) }}" class="btn btn-primary">
           <i class="fas fa-comment"></i>  Tanggapan
      </a>
	<a href="{{ route('pengaduan.selesai', $row->id) }}" class="btn btn-success float-right">
		<li class="fas fa-clipboard-check"></li> Selesai
	</a>
   </div>
</div>

</div>
@endforeach
</div>

@if(count($pengaduan) == 0)
	<x-alert type="warning">
		Data Pengaduan tidak ditemukan
	</x-alert>
@endif