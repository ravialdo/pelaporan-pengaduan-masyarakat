<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Masyarakat</h4>
                    
                    <div class="card-header-action">
                      <form method="post" action="{{ route('masyarakat.search') }}">
                     
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
                  
                  <a href="{{ route('masyarakat.create') }}" class="btn btn-primary m-3">
                       <i class="fa fa-user-plus"></i> Tambah Masyarakat
                    </a>
                  
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">
                              NO
                            </th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                           {{ $slot }}                                                                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>