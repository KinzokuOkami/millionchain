<div class="main_container" id="lists_page">
			<?php $this->load->view('admin/common/breadcrumb'); ?>
			<div class="row-fluid">
				<div class="widget widget-padding span12">
					<div class="widget-header">
						<i class="icon-group"></i>
						<h5><?php echo $current; ?></h5>
						<?php if($addDataLink != 'no') { ?>
						<div class="widget-buttons">
							<a href="<?php echo site_url($addDataLink); ?>" class="tip">Insert New Data &nbsp; <i class="icon-plus"></i></a>
						</div>
						<?php } ?>
					</div>  
					<div class="widget-body">
						<?php $this->load->view($list); ?>
					</div>
				</div>
			</div>

			<script>
				$(function() {
					var n = $('#th-count th').length;
					$('#th-count-result').attr("colspan",n);
				});

				function del_confirm() {
					var choice = confirm("Are you sure you want to delete?");

					if(choice) return true;
					else return false;
				}
			</script>
		
		</div>
