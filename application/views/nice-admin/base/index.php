<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta name="description" content="">
 	<meta name="author" content="">
 	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
 	<title>Career</title>
 	<?php
      $this->load->view('nice-admin/base/css');
      $this->load->view('nice-admin/base/_css');
	?>
	<script src="<?php echo base_url() ?>lib/dist/js/jquery-1.11.3.min.js"></script>
</head>

<body data-theme="dark">
	<div class="preloader">
     	<div class="lds-ripple">
      	<div class="lds-pos"></div>
         <div class="lds-pos"></div>
     	</div>
 	</div>
 	<div id="main-wrapper" data-sidebar-position="fixed">
 		<?php
	      $this->load->view('nice-admin/base/header');
	      // $this->load->view('nice-admin/base/menu');
		?>
		<div class="page-wrapper">
			<?php
		      // $this->load->view('nice-admin/base/breadcrumb');
			?>
			<div class="container-fluid" style="margin-top: -35px;">
				<?php
				if (!defined('BASEPATH')) 
					exit('No direct script access allowed');
            if ($content) {
               $this->load->view($content);
            }  
				?>
			</div>
		</div>
	</div>
	<?php
      $this->load->view('nice-admin/base/js');
      $this->load->view('nice-admin/base/_js');
	?>

 	<script>
  		var site_url = '<?php echo site_url(); ?>';
  		var base_url = '<?php echo base_url(); ?>';
  		var spinner = '<i class="fas fa-spinner fa-spin"></i>';
  		var spinnerbutton = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
  		_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
   	</script>
</body>
</html>