<div class="row justify-content-center">

 <div class="col-md-7">
     <div class="card">
        <div class="card-header">
            <h4>Detail Laporan Pengaduan</h1>
            <span class="badge badge-info">{{ $pengaduan->created_at->diffForHumans() }}</span>
        </div>
        <div class="card-body">
            <div class="chocolat-parent">
               <a href="{{ asset('files/'. $pengaduan->foto) }}" class="chocolat-image" title="Gambar Pengaduan">
                  <div class="text-center">
                     <img alt="Gambar tidak ditemukan" src="{{ asset('files/'. $pengaduan->foto) }}" class="img-fluid img-thumbnail mb-2">                  
                  </div>
               </a>
               <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Tanggal Verifikasi : <br> {{ $pengaduan->verifikasi->format('d M Y H:i') }}</li>
                      <li class="list-group-item">Laporan : <br> {{ $pengaduan->isi_laporan }}</li>
                    </ul>
                  </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('validation.process', $pengaduan->id) }}" class="btn btn-success">
               <i class="fa fa-arrow-circle-right"></i> Proses Sekarang
            </a>
        </div>
   </div>
 </div>

 <div class="col-md-5">
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