<div class="row">
   <div class="col-12 col-md-12 col-lg-12">
       <div class="card">
           <div class="card-header">
                <h4>Laporkan Pengaduan</h4>
            </div>
        <div class="card-body">                                   
                     
        <form method="post" enctype="multipart/form-data" action="{{ route('laporkan-pengaduan.store') }}">
                                                                                        
                 @csrf
                        
                 <div class="form-group">
                 <label>Tanggal Pengaduan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <i class="fas fa-calendar-alt"></i>
                           </div>
                        </div>
                     <input type="text" name="tanggal_pengaduan" class="form-control" value="{{ date('Y-m-d H:i:s') }}" readonly>
                  </div>
               </div>
                  
               <div class="form-group">
               <label>NIK</label>
                     <div class="input-group">
                       <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                       </div>
                    <input type="number" name="nik" class="form-control" value="{{ session('nik') }}" readonly>
                 </div>
              </div>
            
            <div class="form-group">
               <label>Isi Laporan</label>
                     <div class="input-group">
                       <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-align-justify"></i>
                          </div>
                       </div>
                    <textarea rows="5" name="isi_laporan" class="form-control">{{ old('isi_laporan') }}</textarea>
                 </div>
              </div>
                        
             <div class="form-group">
             <label>Foto</label>
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <div class="input-group-text">
                          <i class="fas fa-image"></i>
                       </div>
                    </div>
                  <input type="file" name="foto" class="form-control" value="{{ old('foto') }}">
              </div>
           </div>                             
                  
        

         <button class="btn btn-primary float-right">
              <i class="fa fa-paper-plane"></i> Kirim
         </button>
                  
    </form>
                                          
</div>