<div id="page-wrapper" class="page-wrapper-cls">
	<div id="page-inner">
    <!-- Button trigger modal -->
	<div class="row">
		<div class="col-md-12">
			<input type="hidden" name="did" value="">
			<div class="panel-body">
				<div class="container-fluid">
					
					<div class="row">
							<div class="col-md-5">
							  <div class="panel panel-default">
								<div class="panel-heading">
								  <strong>
									<span class="glyphicon glyphicon-th"></span>
									<span>Add New Categorie</span>
								 </strong>
								</div>
								<div class="panel-body">
								  <?php echo form_open_multipart('Admin/addnewcategorydetail'); ?>
		
									<div class="form-group">
										<label>Name</label><input type="text" name="cname" class="form-control"  value="" required> 
									</div>
									<button type="submit" name="add_cat" class="btn btn-primary">Add categorie</button>
									
									
									
								</form>
								</div>
							  </div>
							</div>
							<div class="col-md-7">
							<div class="panel panel-default">
							  <div class="panel-heading">
								<strong>
								  <span class="glyphicon glyphicon-th"></span>
								  <span>All Categories</span>
							   </strong>
							  </div>
								<div class="panel-body">
								  <table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center" style="width: 50px;">#</th>
											<th>Categories</th>
											<th class="text-center" style="width: 100px;">Edit</th>
											<th class="text-center" style="width: 100px;">Delete</th>
										</tr>
									</thead>
									<tbody>
												<?php 
										if($category->num_rows() > 0 ) 
										{
										$i=1;
											foreach($category-> result() as $list)
											{
										?>
												<tr>
												<input type="hidden" name="did" value="<?php echo $list->cat_id; ?>">
													
													<td class="text-center"><?php echo $list->cat_id;?></td>
													<td><?php echo $list->cat_name;?></td>
													
													 
														<td class="text-center" ><a href="<?php echo base_url() . "Admin/category_view/?id=" . $list->cat_id ; ?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
														  <span class="glyphicon glyphicon-pencil"></span> 
														</a></td>
														<td class="text-center" ><a href="<?php echo base_url() . "Admin/deletecategory/?id=" . $list->cat_id ; ?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure that you want to delete the user ?')">
														  <span class="glyphicon glyphicon-remove"></span>
														</a></td>
													
												</tr>
										<?php 
											}
										}

										?>


									 
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
    </div>

    <!-- /. PAGE INNER  --> 
</div>
  <!-- /. PAGE WRAPPER  --> 

