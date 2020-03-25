<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('img/stisla-light.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ url('register') }}" class="needs-validation" novalidate="">
               
                  @csrf
                  
                  <div class="form-group">
                      <label>
                        NIK <span class="text-primary">*</span>
                      </label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fa fa-key"></i>
                         </div>
                        </div>
                        <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required autofocus>
                        @error('nik')                                     
                            <div class="invalid-feedback">
                                 {{ $message }}
                           </div>
                        @enderror
                     </div>                     
                    </div>
                  
                  <div class="form-group">
                      <label>
                        Nama <span class="text-primary">*</span>
                      </label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fa fa-user"></i>
                         </div>
                        </div>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>                                          
                         @error('nama')                                     
                            <div class="invalid-feedback">
                                 {{ $message }}
                           </div>
                        @enderror
                     </div>                     
                    </div>
                  
                  <div class="form-group">
                      <label>
                         Username <span class="text-primary">*</span>
                      </label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fa fa-user"></i>
                         </div>
                        </div>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>                                          
                         @error('username')                                     
                            <div class="invalid-feedback">
                                 {{ $message }}
                           </div>
                        @enderror
                     </div>                     
                    </div>

                  <div class="form-group">
                      <label>
                         Password <span class="text-primary">*</span>
                      </label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fa fa-lock"></i>
                         </div>
                        </div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>                                          
                         @error('password')                                     
                            <div class="invalid-feedback">
                                 {{ $message }}
                           </div>
                        @enderror
                     </div>                     
                    </div>
                  
                  <div class="form-group">
                      <label>
                         Telepon <span class="text-primary">*</span>
                     </label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fa fa-phone"></i>
                         </div>
                        </div>
                        <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" required>                                          
                         @error('telepon')                                     
                            <div class="invalid-feedback">
                                 {{ $message }}
                           </div>
                        @enderror
                     </div>                     
                    </div>
                                    

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
                

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Sudah punya akun? <a href="{{ url('login')  }}">Login</a>
            </div>
            <div class="simple-footer">
               Backend by <a href="https://github.com/ravialdo/">Ravialdo Imanda Putra</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>