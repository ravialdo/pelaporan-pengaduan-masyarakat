<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('img/stisla-light.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login Masyarakat</h4></div>

              <div class="card-body">
				<div class="alert alert-light text-center">
					untuk login petugas silahkan <a href="{{ url('login-petugas') }}" class="text-primary">Klik disini</a>
				</div>
                <form method="POST" action="{{ url('login') }}" class="needs-validation" novalidate="">
               
                  @csrf
                                           
                   <div class="form-group">
                      <label>Username</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fa fa-user"></i>
                         </div>
                        </div>
                        <input type="text" name="username" class="form-control" required autofocus>                                          
                         <div class="invalid-feedback">
                          username tidak boleh kosong
                      </div>
                     </div>                     
                    </div>
                   
                  
                    <div class="form-group">
                      <label>Password</label>
                      
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-lock"></i>
                         </div>
                        </div>
                        <input type="password" name="password" class="form-control" required>
                        <div class="invalid-feedback">
                          password tidak boleh kosong
                        </div>
                      </div>                     
                    </div>
                     
                                                                                                       

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum punya akun? <a href="{{ url('register')  }}">Register</a>
            </div>
            <div class="simple-footer">
               Backend by <a href="https://github.com/ravialdo/">Ravialdo Imanda Putra</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>