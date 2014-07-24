<?php $controller = 'card';?>
<table class="table table-striped table-bordered dataTable">
							<thead>
								<tr id="th-count">
									<th>ID</th>
									<th>Picture</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php if(empty($result)) {?>
								<tr >
									<td id="th-count-result" class="c-empty-record" colspan="">No records yet!</td>
								</tr>
							<?php } else {?>
								<?php foreach ($result as $row) { ?>
									<tr>
										<td><?php echo $row->card_number; ?></td>
										<td>
											<?php if(!empty($row->card_pic_small)) { 
												echo '<img class="c-list-image" src="' . base_url() . 'res/images/' . $controller . '/small/' . $row->card_pic_small . '"/>'; 
											} else {
												echo '-'; 
											}?>
										</td>
										<td>
											<div class="btn-group">
											<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
											Action
												<span class="caret"></span>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="<?php echo site_url('admin/' . $controller . '/form/' . $row->card_id .'');?>" ><i class="icon-edit" ></i> Edit</a></li>
												<li><a href="<?php echo site_url('admin/' . $controller . '/delete/' . $row->card_id .'');?>" onclick="return del_confirm();"><i class="icon-trash"></i> Delete</a></li>
											</ul>
											</div>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
							</tbody>
						</table>

