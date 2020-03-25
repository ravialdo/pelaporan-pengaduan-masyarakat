<div class="row">
   <div class="col-12 col-md-12 col-lg-12">
       <div class="card">
           <div class="card-header">
                <h4>Edit Pengaduan</h4>
            </div>
        <div class="card-body">                                   
                     
        <form method="post" enctype="multipart/form-data" action="{{ route('pengaduan.update', $pengaduan->id) }}">
                  
                 @method('put')                                                              
                 @csrf
                        
                 <div class="form-group">
                 <label>Tanggal Pengaduan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <i class="fas fa-calendar-alt"></i>
                           </div>
                        </div>
                     <input type="text" name="tanggal_pengaduan" class="form-control" value="{{ $pengaduan->tanggal_pengaduan }}" readonly>
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
                    <input type="number" name="nik" class="form-control" value="{{ $pengaduan->nik }}" readonly>
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
                    <textarea rows="5" name="isi_laporan" class="form-control">{{ $pengaduan->isi_laporan }}</textarea>
                 </div>
              </div>
                        
             <div class="form-group">
             <label>Foto <span class="text-primary">(Optional)</span></label>
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <div class="input-group-text">
                          <i class="fas fa-image"></i>
                       </div>
                    </div>
                  <input type="file" name="foto" class="form-control">
              </div>
           </div>                             
                       

         <button class="btn btn-primary float-right">
              <i class="fa fa-edit"></i> Edit
         </button>
                  
    </form>
                                          
</div>