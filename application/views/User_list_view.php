<div id="page-wrapper" class="page-wrapper-cls">
	<div id="page-inner">
		<!-- Button trigger modal -->
		<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-11">
							<div class="panel panel-default">
								<div class="panel-heading">
								<?php echo form_open_multipart('Admin/edit_userdetails'); ?>
								<?php $message = $this->session->flashdata('item'); ?>
								<strong>
								  <span class="glyphicon glyphicon-th"></span>
								  <span style="color: green;"><?php echo $message['message']; ?></span>
							   </strong>
								</div>
								<?php 
								if($user_view_id->num_rows() > 0 ) 
								{
									$i=1;
									foreach($user_view_id-> result() as $list)
									{
									//print_r($query);
									//echo $list[id];
								?>
									<input type="hidden" name="did" value="<?php echo $list->id; ?>">
									<div class="panel-body">
										<div class="container-fluid">
											<div class="form-group"> 
												<label>Name</label><input type="text" name="name"  class="form-control"  value="<?php echo $list->name; ?>" >   
											</div>
											<div class="form-group">
												<label>Username</label><input type="text" name="user" class="form-control" value="<?php echo $list->username; ?>" readonly> 
											</div>
											<div class="form-group">  
												<label>Password</label><input type="text"  class="form-control"  name="password" value="<?php echo $list->password; ?>"   required>   
											</div>
											<div class="form-group">
											
											<?php 
											$roleid=$list->role;
											if($roleid == '1')
											{
												$rolename= "Admin";
											}
											else{
												$rolename = "Client";
											}
											?>
											<input type="hidden"  class="form-control"  name="role" value="<?php echo $list->role; ?>">
												<label>Role</label><input type="text"  class="form-control"  name="role1" value="<?php echo $rolename; ?>" readonly>   
											</div>
											<hr>  
											<div class="form-group">
												<label>Profile Image</label>
												<div class="row">
													<label class="col-sm-2 ">
													<?php	if (strpos($list->image, 'http') === 0) {  ?>
													<img src="<?php echo $list->image; ?>" class="img-thumbnail">
													<?php } else { ?>

													<img src="<?php echo base_url()."Userimage/".$list->image; ?>" class="img-thumbnail">
													<?php } ?>

													</label>
													<div class="col-sm-10">
														<input type="hidden" name="image"  class="form-control" value="<?php echo $list->image; ?>"> 
														<input type="file" name="userfile"   class="form-control" value=""  id="userfile" size="20" />    
													</div>
												</div>
											</div>
											<input type="hidden" name="image"  class="form-control" value="<?php echo $list->image; ?>">
											<div class="form-group"> 
												<label>Status</label>
												<select name="status"  class="form-control"  required>
													<option value="2" <?php echo ($list->status==  '2') ? ' selected="selected"' : '';?>>Approve</option>
													<option value="3" <?php echo ($list->status==  '3') ? ' selected="selected"' : '';?>>Disapprove</option>
												</select>
											</div>  
											<div class="row">
												<input type="submit" id="submit" name="submit" class="btn btn-info center-block" value="Update" style="margin-left: 352px;">
												<input type="button" style="margin-top: -34px;" class="btn btn-info center-block" value="Cancel" name="Cancel" onclick="window.location='<?php echo base_url().'Admin/user_list_view';?>'">
											</div>
										</div>
									</div>

								<?php 
									} 
								} ?>
										
								</form>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		</div>		
	<!-- /. PAGE INNER  --> 
	</div>
  <!-- /. PAGE WRAPPER  --> 
</div>
