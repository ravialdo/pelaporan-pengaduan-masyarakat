<div class="alert alert-{{ $type }} alert-has-icon alert-dismissible show fade">
  <div class="alert-icon">
      <i class="far fa-lightbulb"></i>
  </div>
     <div class="alert-body">
         <button class="close" data-dismiss="alert">
             <span>&times;</span>
         </button> 
         <div class="alert-title">Pesan</div>
           {{ $slot }}
     </div>
</div>