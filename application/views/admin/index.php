<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/meta'); ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>res/js/jquery-1.11.0.min.js"></script>
	
</head>

<body >

<div id="wrap">
	<?php $this->load->view('admin/header'); ?>
	<div class="container-fluid">
		<?php $this->load->view('admin/sidebar'); ?>
	</div>
	<?php $this->load->view('admin/scripts'); ?>
</div>

</body>
</html>