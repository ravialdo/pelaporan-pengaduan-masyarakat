<div class="row">

	<div class="col-md-3">
		<div class="card card-primary">		
                <div class="card-wrap">
                	<div class="card-header">
                    	<h4> <i class="fas fa-users"></i> Total Masyarakat</h4>
                    </div>
                    <div class="card-body">
                    	{{ $masyarakat }}
                   </div>
               </div>

	    </div>		
	</div>
	<div class="col-md-3">
		<div class="card card-success">
	
			<div class="card-wrap">
               	<div class="card-header">
                   		<h4> <i class="fas fa-user-friends"></i> Total Petugas</h4>
                  </div>
                  <div class="card-body">
                   		{{ $petugas }}
                  </div>
                </div>

	     </div>		
	</div>
	<div class="col-md-3">
		<div class="card card-info">
		
			<div class="card-wrap">
               	<div class="card-header">
                    	<h4> <i class="fas fa-user"></i> Total Admin</h4>
                   </div>
                  <div class="card-body">
                  	  {{ $admin }}
                  </div>
               </div>

	       </div>
	</div>
	<div class="col-md-3">
		<div class="card card-warning">
		
			<div class="card-wrap">
               	<div class="card-header">
                    	<h4> <i class="fas fa-archive"></i> Total Pengaduan</h4>
                   </div>
                  <div class="card-body">
                  	   {{ $pengaduan }}
                  </div>
               </div>

		</div>
	</div>
	
</div>