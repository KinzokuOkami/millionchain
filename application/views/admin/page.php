<?php 
	
		if ( $content != 'admin/login' && $this->session->userdata('login_state') == FALSE ) {
			header("Location: " . site_url('admin'));
			exit;
		}

		if ( $content == 'admin/login' && $this->session->userdata('login_state') == TRUE ) {
			header("Location: " . site_url('admin/dashboard'));
			exit;
		}
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/meta'); ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>res/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>
	
</head>

<body >

<div id="wrap">
	<?php if($content != 'admin/login') $this->load->view('admin/header'); ?>
	<div class="container-fluid">
		<?php if($content != 'admin/login') $this->load->view('admin/sidebar'); ?>
		<?php $this->load->view($content); ?>
	</div>
	<?php $this->load->view('admin/scripts'); ?>
</div>

</body>
</html>