<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data Petugas</h4>
                  </div>
                  <div class="card-body">                                   
                     
                    <form method="post" action="{{ route('petugas.update', $id) }}">
                         
                        @method('put')                                                        
                        @csrf
                        
                        <div class="form-group">
                            <label>Nama</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text">
                                     <i class="fas fa-user"></i>
                                   </div>
                                 </div>
                               <input type="text" name="nama" class="form-control" value="{{ $nama }}">
                            </div>
                         </div>
                  
                         <div class="form-group">
                            <label>Username</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text">
                                     <i class="fas fa-user-tie"></i>
                                   </div>
                                 </div>
                              <input type="text" name="username" class="form-control" value="{{ $username }}">
                            </div>
                         </div>
                        
                        <div class="form-group">
                            <label>Password <span class="text-primary">(optional)</span></label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text">
                                     <i class="fas fa-lock"></i>
                                   </div>
                                 </div>
                              <input type="password" name="password" class="form-control">
                            </div>
                         </div>
                  
                        <div class="form-group">
                            <label>Telepon</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text">
                                     <i class="fas fa-phone"></i>
                                   </div>
                                 </div>
                              <input type="number" name="telepon" class="form-control" value="{{ $telepon }}">
                           </div>
                        </div>                                         
                  
                         <div class="form-group">
                            <label>Level</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <div class="input-group-text">
                                     <i class="fas fa-user-shield"></i>
                                   </div>
                                 </div>
                              <select name="level" class="custom-select">
                                 <option value="">Silahkan Pilih</option>
                                 <option value="admin" {{ $level == 'admin' ? 'selected' : '' }}>Admin</option>
                                 <option value="petugas" {{ $level == 'petugas' ? 'selected' : '' }}>Petugas</option>
                              </select>
                           </div>
                        </div>
                  
                        <button class="btn btn-primary float-right">
                           <i class="fa fa-edit"></i> Edit
                        </button>
                  
                  </form>
                                          
                </div>