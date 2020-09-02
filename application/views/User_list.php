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
								<?php// echo form_open_multipart('Admin/edit_userdetails'); ?>
								<?php $message = $this->session->flashdata('item'); ?>
								<strong>
								  <span class="glyphicon glyphicon-th"></span>
								  <span style="color: green;"><?php echo $message['message']; ?></span>
							   </strong>
								</div>
								<div class="panel-body">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr role="row">
										<th style="text-align:center" class="dis-pointer">S.no</th>
										<th style="text-align:center" class="dis-pointer">Image</th>
										<th style="text-align:center" class="dis-pointer">Name</th>
										<th style="width: 120px;text-align:center" class="dis-pointer">Username</th>
										<th style="text-align:center" class="dis-pointer">Password</th>
										<th style="text-align:center" class="dis-pointer">Role</th>
										<th style="text-align:center" class="dis-pointer">Status</th>
										<th style="text-align:center" class="dis-pointer">Edit</th>
										<th style="text-align:center" class="dis-pointer">Delete</th>
										</tr>
									</thead>

									<tbody role="alert" aria-live="polite" aria-relevant="all">

										<div class="col-lg-10 col-md-10 col-sm-10">
											<div class="container-fluid main-container">
												<?php if($user_list_view1->num_rows() > 0 ) 
												{
												$i=1;
												foreach($user_list_view1-> result() as $row)
												{
													?>
													<tr id="1" class="even_gradeA odd">
														<td class=" ">  <div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"> <label><?php echo $i; ?></label> </div></td>

														<td class="sorting_1"> <div class="col-lg-3 col-md-3 co-sm-3 col-xs-3 profile-image">
														<?php  
															if (strpos($row->image, 'http') === 0) 
															{
															?>
															<img  src="<?php echo $row->image; ?>" >
															<?php			
															}
															elseif($row->image!=NULL)
															{ ?>
															<img  src="<?php echo base_url()."userimage/".$row->image; ?>"  style="height: 80px; width: 80px;">
															<?php 
															}
															else
															{ 
															?>
															<img  src="<?php echo base_url(); ?>assets/img/user80.png" style="height: 80px; width: 80px;">
															<?php
															} ?>
															<input type="hidden" value="<?php echo $row->id; ?>" name="did"></div>
														</td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->name; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->username; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->password; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->role; ?></label> </div></td>
														<td class=" ">
															<div class="col-lg-3 col-md-3 co-sm-3 col-xs-3">
															<?php 
																$status=$row->status; 
																if($status==2)
																{
																echo "Approve";
																}
																elseif($status==3)
																{
																echo "Disapprove";
																}
																elseif($status==1)
																{
																echo "Waiting";
																}
															?>

															</div>
														</td>
														<td class=" ">
															<div class="col-lg-3 col-md-3 co-sm-3 col-xs-3">
																<a href="<?php echo base_url() . "Admin/user_view/?id=" . $row->id; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
																<i class="glyphicon glyphicon-pencil"></i> Edit
															

																</a>
															</div>
														</td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3">
														<a href="<?php echo base_url() . "Admin/deleteuser/?id=" . $row->id; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip"  title="Remove" onclick="return confirm('Are you sure that you want to delete the user ?')"><i class="glyphicon glyphicon-remove"></i>Delete  </a>
														</div></td>

													</tr>
													<?php 
													$i++;
													}
												}
												else
												{
												echo "No Record Found...";
												}	
												?>
											</div>
										</div>	

									</tbody>
								</table>
								</div>
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
