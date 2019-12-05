<div class="row">
   <div class="col-md-4">
   	<div class="row">
	 		<div class="col-md-12">
		   	<div class="card card-welcome">
		   		<div class="card-body">		   	
		        		<h4 class="font-weight-bold text-white">Halo, <?php echo $applicant_detail['fullname'] ?></h4>
		           	<p class="text-justify">
		           		Selamat datang di career. Silahkan beritahu admin kami untuk konfirmasi registrasi anda..
		     			</p>
		     			<?php 
		     			if($status['status']){
		     			?>
			     			<div class="box bg-success text-center">
			               <h5 class="text-white">Registrasi disetejui</h5>
			        		</div>
		     			<?php 
		     			}else{
		     			?>
		     				<div class="box bg-warning text-center">
			               <h5 class="text-white">Menunggu persetujuan</h5>
			        		</div>
			        		<h6 class="font-italic text-center">
			        			<small>Setelah registrasi anda di approve, anda sudah tidak bisa lagi mengganti pilihan lowongan pekerjaan</small>
			        		</h6>
		     			<?php 
		     			}
		     			?>
		     		</div>
		    	</div>
	    	</div>
	 		<div class="col-md-12">
		   	
			</div>
			<div class="col-md-12">
			</div>
    	</div>
	</div>
	<div class="col-md-4">
		<div class="card" id="card-cv">
   		<div class="card-body">		
   			<h4 class="card-title">Upload CV</h4>
   			<div class="row">
   				<div class="col-md-3 sect-data"></div>
					<div class="col-md-9">
						<form id="form-upload-cv" class="needs-validation" novalidate>
		   				<div class="form-row">
		         			<div class="col-md-12 mb-2">
		   						<input type="file" class="form-control-file" name="userfile" required>
								</div>
							</div>
							<div class="form-row">
		         			<div class="col-md-12">
		   						<button type="submit" class="btn btn-dark btn-sm btn-block">UPLOAD</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card" id="card-photo">
   		<div class="card-body">		
   			<h4 class="card-title">Upload Pas Foto</h4>   
   			<div class="row">
   				<div class="col-md-3 sect-data"></div>
					<div class="col-md-9">
						<form id="form-upload-photo" class="needs-validation" novalidate>
		   				<div class="form-row">
		         			<div class="col-md-12 mb-2">
		   						<input type="file" class="form-control-file" name="userfile" required>
								</div>
							</div>
							<div class="form-row">
		         			<div class="col-md-12 ">
		   						<button type="submit" class="btn btn-dark btn-sm btn-block">UPLOAD</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card" id="card-lowongan">
			<div class="card-body">
				<h4 class="card-title">Daftar Lowongan</h4>
				<h6 class="card-subtitle font-weight-normal">Silahkan pilih salah satu lowongan yang anda inginkan</h6>
				<div class="sect-data"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal" z-index="-1" id="modal-detail-vacancy">
   <div class="modal-dialog modal-lg">
       <div class="modal-content" id="cont-detail-vacancy">
           <div class="modal-header">
               <h4 class="modal-title vacancy-name" id="mySmallModalLabel"></h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           </div>
           <div class="modal-body sect-data"></div>
           <div class="modal-footer">
           		<button class="btn btn-info btn-block btn-apply-vacancy" type="button">APPLY</button>
           </div>
       </div>
   </div>
</div>