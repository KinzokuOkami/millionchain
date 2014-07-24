<div class="sidebar-nav nav-collapse collapse">
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle b_32B2E6 <?php if($current == 'Dashboard') echo 'active'; ?>" href="<?php echo site_url('admin/dashboard'); ?>"><i class="icon-dashboard"></i> <span>Dashboard</span></a>
					</div>
				</div>

				<div class="accordion-group">
					<div class="accordion-heading">
						<div class="c-accordion-item">
							<a class="accordion-toggle b_32B2E6 <?php if($current == 'Card') echo 'active'; ?>" href="<?php echo site_url('admin/card'); ?>"><i class="icon-briefcase"></i> <span>Cards</span></a>
							<a class="c-add icon-plus pull-right" href="<?php echo site_url('admin/card/form'); ?>" style="display:inline-block;"></a>
						</div>
					</div>
				</div>    

			</div>
		</div>