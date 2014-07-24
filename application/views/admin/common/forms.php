<div class="main_container" id="forms_page">
			<?php $this->load->view('admin/common/breadcrumb'); ?>
			<div class="row-fluid">
				<div class="widget widget-padding span12">
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h5><?php echo $formType; ?> New <?php echo $current; ?></h5>
						<div class="widget-buttons">
							<a href="<?php echo site_url($viewListLink); ?>" class="tip">View Lists &nbsp; <i class="icon-eye-open"></i></a>
						</div>
					</div>
					<form action="<?php echo site_url($formAction); ?>" method="post" enctype="multipart/form-data">
						<div class="widget-body">
							<div class="widget-forms clearfix">
								<div class="form-horizontal">
									<?php $this->load->view($form); ?>
								</div>
							</div>
						</div>
						<div class="widget-footer">
							<input id="c-save-form" class="btn btn-primary" type="submit" value="Save" <?php if(isset($editor)) echo 'onclick="getTextEditor();"'; ?> />
							<a href="<?php echo site_url($viewListLink); ?>" id="c-cancel-form" class="btn" type="button">Cancel</a>
						</div>
					</form>
				</div>
			</div>  
		
		</div>
