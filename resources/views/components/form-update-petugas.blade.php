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
                                          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $nama }}">
                                          @error('nama')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
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
                                          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $username }}">
                                          @error('username')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
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
                                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                          @error('password')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
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
                                          <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ $telepon }}">
                                          @error('telepon')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
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
                                          <select name="level" class="custom-select @error('level') is-invalid @enderror">
                                                <option value="">Silahkan Pilih</option>
                                                <option value="admin" {{ $level=='admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="petugas" {{ $level=='petugas' ? 'selected' : '' }}>Petugas</option>
                                          </select>
                                          @error('level')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
                                    </div>
                              </div>

                              <button class="btn btn-primary float-right">
                                    <i class="fa fa-edit"></i> Edit
                              </button>

                        </form>

                  </div>