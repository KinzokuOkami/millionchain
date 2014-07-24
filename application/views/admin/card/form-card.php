<?php $controller = 'card';?>
								<div class="control-group">
									<label class="control-label">ID</label>
									<div class="controls">
										<input class="span7" name="number" type="text" <?php if(isset($formNumber)) echo 'value="' . $formNumber . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Name</label>
									<div class="controls">
										<input class="span7" name="name" type="text" <?php if(isset($formName)) echo 'value="' . $formName . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Picture Small</label>
									<div class="controls">
										<img id="c-uploaded-file" src="<?php if(isset($formPicSmall) && !empty($formPicSmall)) echo base_url() . 'res/images/' . $controller . '/small/' . $formPicSmall; ?>" <?php if(isset($formPicSmall) && !empty($formPicSmall)) echo 'style="display:block;"'; ?>/>
										<input id="image-name" class="span7 c-hidden" name="pic_small" type="text" value="<?php if(isset($formPicSmall)) echo $formPicSmall; ?>">
										
										<?php if(isset($formPicSmall) && !empty($formPicSmall)) echo '<span id="c-remove-pic">Remove current picture</span>'; ?>
										
										<div id="queue"></div>
										<input id="file_upload" name="file_upload" type="file" style="display:none;">
										<script type="text/javascript">
											$('#c-remove-pic').click(function() {
												$('#image-name').val('');
												$('#c-uploaded-file').fadeOut(350);
												$('#c-uploaded-file').attr("src", "");
												$(this).fadeOut(350);
											});
										</script>
										<script type="text/javascript">
											<?php $timestamp = time();?>
											<?php $timestamp_file = new DateTime();?>
											$(function() {
												$('#file_upload').uploadifive({
													'auto'             : true,
													'checkScript'      : '<?php echo site_url("admin/" . $controller . "/check_exist"); ?>',
													'formData'         : {
																			'savefile-time'	: '<?php echo $timestamp_file->getTimestamp(); ?>',
																			'timestamp' : '<?php echo $timestamp;?>',
																			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
																		 },
													'queueID'          : 'queue',
													'uploadScript'     : '<?php echo site_url("admin/" . $controller . "/upload"); ?>',
													'onUpload' : function() {
														$('#c-remove-pic').fadeOut(350);
														$('#c-save-form').prop('disabled', true);
														$('#c-cancel-form').prop('disabled', true);
													},
													'onCancel' : function() { 
														$('#image-name').val('');
														$('#c-uploaded-file').fadeOut(350);
														$('#c-uploaded-file').attr("src", "");
													},
													'onUploadComplete' : function(file, data) { 
														$('#c-save-form').prop('disabled', false);
														$('#c-cancel-form').prop('disabled', false);
														
														var new_name;
														var file_ext;
														 
														file_ext = file.type.substr(6,file.type.length);
														if(file_ext == "jpeg") file_ext = "jpg";
														 
														new_name = '<?php echo $timestamp_file->getTimestamp(); ?>' + '.' + file_ext;
														 
														$('#image-name').val(new_name);
														$('#c-uploaded-file').attr("src", "<?php echo base_url() . "res/images/" . $controller . "/small/"; ?>" + new_name);
														$('#c-uploaded-file').fadeIn(350);
														console.log(data); 
													}
												});
											});
										</script>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Picture Large</label>
									<div class="controls">
										<img id="c-uploaded-file2" src="<?php if(isset($formPicLarge) && !empty($formPicLarge)) echo base_url() . 'res/images/' . $controller . '/large/' . $formPicLarge; ?>" <?php if(isset($formPicLarge) && !empty($formPicLarge)) echo 'style="display:block;"'; ?>/>
										<input id="image2-name" class="span7 c-hidden" name="pic_large" type="text" value="<?php if(isset($formPicLarge)) echo $formPicLarge; ?>">
										
										<?php if(isset($formPicLarge) && !empty($formPicLarge)) echo '<span id="c-remove-pic2">Remove current picture</span>'; ?>
										
										<div id="queue2"></div>
										<input id="file2_upload" name="file_upload" type="file" style="display:none;">
										<script type="text/javascript">
											$('#c-remove-pic2').click(function() {
												$('#image2-name').val('');
												$('#c-uploaded-file2').fadeOut(350);
												$('#c-uploaded-file2').attr("src", "");
												$(this).fadeOut(350);
											});
										</script>
										<script type="text/javascript">
											<?php $timestamp = time();?>
											<?php $timestamp_file = new DateTime();?>
											$(function() {
												$('#file2_upload').uploadifive({
													'auto'             : true,
													'checkScript'      : '<?php echo site_url("admin/" . $controller . "/check_exist_c"); ?>',
													'formData'         : {
																			'savefile-time'	: '<?php echo $timestamp_file->getTimestamp(); ?>',
																			'timestamp' : '<?php echo $timestamp;?>',
																			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
																		 },
													'queueID'          : 'queue2',
													'uploadScript'     : '<?php echo site_url("admin/" . $controller . "/upload_c"); ?>',
													'onUpload' : function() {
														$('#c-remove-pic2').fadeOut(350);
														$('#c-save-form').prop('disabled', true);
														$('#c-cancel-form').prop('disabled', true);
													},
													'onCancel' : function() { 
														$('#image2-name').val('');
														$('#c-uploaded-file2').fadeOut(350);
														$('#c-uploaded-file2').attr("src", "");
													},
													'onUploadComplete' : function(file, data) { 
														$('#c-save-form').prop('disabled', false);
														$('#c-cancel-form').prop('disabled', false);
														
														var new_name;
														var file_ext;
														 
														file_ext = file.type.substr(6,file.type.length);
														if(file_ext == "jpeg") file_ext = "jpg";
														 
														new_name = '<?php echo $timestamp_file->getTimestamp(); ?>' + '.' + file_ext;
														 
														$('#image2-name').val(new_name);
														$('#c-uploaded-file2').attr("src", "<?php echo base_url() . "res/images/" . $controller . "/large/"; ?>" + new_name);
														$('#c-uploaded-file2').fadeIn(350);
														console.log(data); 
													}
												});
											});
										</script>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Stars</label>
									<div class="controls">
										<input class="span7" name="stars" type="text" <?php if(isset($formStars)) echo 'value="' . $formStars . '"'; ?>>
									</div>
								</div>
								
								<!--<div class="control-group">
									<label class="control-label">Color</label>
									<div class="controls">
										<input class="span7" name="color" type="text" <?php if(isset($formColor)) echo 'value="' . $formColor . '"'; ?>>
									</div>
								</div>-->
								
								<div class="control-group">
									<label class="control-label">Color</label>
									<div class="controls">
										<select name="color">
											<option value="1" <?php if(isset($formColor)) if($formColor==1) echo 'selected'; ?>>Orange</option>
											<option value="2" <?php if(isset($formColor)) if($formColor==2) echo 'selected'; ?>>Purple</option>
											<option value="3" <?php if(isset($formColor)) if($formColor==3) echo 'selected'; ?>>Blue</option>
											<option value="4" <?php if(isset($formColor)) if($formColor==4) echo 'selected'; ?>>Green</option>
										</select>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Leader Skill</label>
									<div class="controls">
										<select name="ls_type" class="span7">
											<option value="0" <?php if(isset($formLSType)) if($formLSType==0) echo 'selected'; ?>>None</option>
											<option value="1" <?php if(isset($formLSType)) if($formLSType==1) echo 'selected'; ?>>X type HP xY</option>
											<option value="2" <?php if(isset($formLSType)) if($formLSType==2) echo 'selected'; ?>>X type attack xY</option>
											<option value="3" <?php if(isset($formLSType)) if($formLSType==3) echo 'selected'; ?>>X type regeneration xY</option>
											<option value="4" <?php if(isset($formLSType)) if($formLSType==4) echo 'selected'; ?>>Increase X type attack xY while on full HP</option>
											<option value="5" <?php if(isset($formLSType)) if($formLSType==5) echo 'selected'; ?>>Increase attack xX while HP is Y% remaining</option>
											<option value="6" <?php if(isset($formLSType)) if($formLSType==6) echo 'selected'; ?>>Increase attack xX while chaining Y panels</option>
											<option value="7" <?php if(isset($formLSType)) if($formLSType==7) echo 'selected'; ?>>Each turn deals attack x0.5</option>
											<option value="8" <?php if(isset($formLSType)) if($formLSType==8) echo 'selected'; ?>>Each turn heals X% HP</option>
											<option value="9" <?php if(isset($formLSType)) if($formLSType==9) echo 'selected'; ?>>Reduce X type damage by Y%</option>
											<option value="10" <?php if(isset($formLSType)) if($formLSType==10) echo 'selected'; ?>>Increase Super Chain time by Xs</option>
											<option value="11" <?php if(isset($formLSType)) if($formLSType==11) echo 'selected'; ?>>Blocks attack that would reduce HP to 0 1 times</option>
											<option value="12" <?php if(isset($formLSType)) if($formLSType==12) echo 'selected'; ?>>Increase regeneration xX while HP is Y% remaining</option>
										</select>
										<br/><br/>
										<input class="span2" name="ls_x" type="text" placeholder="X value" <?php if(isset($formLSX)) echo 'value="' . $formLSX . '"'; ?>>
										<input class="span2" name="ls_y" type="text" placeholder="Y value" <?php if(isset($formLSY)) echo 'value="' . $formLSY . '"'; ?>>
										<input class="span2" name="ls_z" type="text" placeholder="Z value" <?php if(isset($formLSZ)) echo 'value="' . $formLSZ . '"'; ?>>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Skill</label>
									<div class="controls">
										<select name="skill_type" class="span7">
											<option value="1" <?php if(isset($formSkillType)) if($formSkillType==1) echo 'selected'; ?>>Deals X damage to all enemies</option>
											<option value="2" <?php if(isset($formSkillType)) if($formSkillType==2) echo 'selected'; ?>>Deals X damage to single enemy</option>
											<option value="3" <?php if(isset($formSkillType)) if($formSkillType==3) echo 'selected'; ?>>Deals X damage to all enemies and break their shields</option>
											<option value="4" <?php if(isset($formSkillType)) if($formSkillType==4) echo 'selected'; ?>>Reduce all enemy HP by X%</option>
											<option value="5" <?php if(isset($formSkillType)) if($formSkillType==5) echo 'selected'; ?>>Heals X% HP</option>
											<option value="6" <?php if(isset($formSkillType)) if($formSkillType==6) echo 'selected'; ?>>Increase enemy turn by X</option>
											<option value="7" <?php if(isset($formSkillType)) if($formSkillType==7) echo 'selected'; ?>>Add X to enemy weakness for 1 turn</option>
											<option value="8" <?php if(isset($formSkillType)) if($formSkillType==8) echo 'selected'; ?>>Increase X type attack by Y for Z turns</option>
											<option value="9" <?php if(isset($formSkillType)) if($formSkillType==9) echo 'selected'; ?>>Fill the Super Chain to max</option>
											<option value="10" <?php if(isset($formSkillType)) if($formSkillType==10) echo 'selected'; ?>>Reduce 100% damage from X Y times</option>
											<option value="11" <?php if(isset($formSkillType)) if($formSkillType==11) echo 'selected'; ?>>Reduce all damage by X% Y times</option>
											<option value="12" <?php if(isset($formSkillType)) if($formSkillType==12) echo 'selected'; ?>>Change X panel to Y panel</option>
											<option value="13" <?php if(isset($formSkillType)) if($formSkillType==13) echo 'selected'; ?>>Increase the X panel appearance by Y times for Z turns</option>
											<option value="14" <?php if(isset($formSkillType)) if($formSkillType==14) echo 'selected'; ?>>Heals X% HP for Y turns</option>
											<option value="15" <?php if(isset($formSkillType)) if($formSkillType==15) echo 'selected'; ?>>Heals X% HP, and a chance to fill party skill gauge</option>
										</select>
										<br/><br/>
										<input class="span2" name="skill_x" type="text" placeholder="X value" <?php if(isset($formSkillX)) echo 'value="' . $formSkillX . '"'; ?>>
										<input class="span2" name="skill_y" type="text" placeholder="Y value" <?php if(isset($formSkillY)) echo 'value="' . $formSkillY . '"'; ?>>
										<input class="span2" name="skill_z" type="text" placeholder="Z value" <?php if(isset($formSkillZ)) echo 'value="' . $formSkillZ . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">HP</label>
									<div class="controls">
										<input class="span7" name="hp" type="text" <?php if(isset($formHp)) echo 'value="' . $formHp . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Max HP</label>
									<div class="controls">
										<input class="span7" name="max_hp" type="text" <?php if(isset($formMaxHp)) echo 'value="' . $formMaxHp . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Attack</label>
									<div class="controls">
										<input class="span7" name="atk" type="text" <?php if(isset($formAtk)) echo 'value="' . $formAtk . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Max Attack</label>
									<div class="controls">
										<input class="span7" name="max_atk" type="text" <?php if(isset($formMaxAtk)) echo 'value="' . $formMaxAtk . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Heal</label>
									<div class="controls">
										<input class="span7" name="heal" type="text" <?php if(isset($formHeal)) echo 'value="' . $formHeal . '"'; ?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Max Heal</label>
									<div class="controls">
										<input class="span7" name="max_heal" type="text" <?php if(isset($formMaxHeal)) echo 'value="' . $formMaxHeal . '"'; ?>>
									</div>
								</div>
