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
								<strong>
								  <span class="glyphicon glyphicon-th"></span>
								  <span>All Categories</span>
							   </strong>
								</div>
								<div class="panel-body">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr role="row">
									<th style="text-align:center" class="dis-pointer">S.no</th>
									<th style="text-align:center" class="dis-pointer">Product Name</th>
									<th style="text-align:center" class="dis-pointer">Category</th>
									<th style="width: 120px;text-align:center" class="dis-pointer">Quantity</th>
									<th style="text-align:center" class="dis-pointer">Price</th>
									<th style="text-align:center" class="dis-pointer">Description</th>
									<th style="text-align:center" class="dis-pointer">Detail</th>
									
									</tr>
								</thead>

								<tbody role="alert" aria-live="polite" aria-relevant="all">

									<div class="col-lg-10 col-md-10 col-sm-10">
										<div class="container-fluid main-container">
											<?php if($product_list_view->num_rows() > 0 ) 
											{
											$i=1;
											foreach($product_list_view-> result() as $row)
												{
													?>
															
													<tr id="1" class="even_gradeA odd">
														<td class=" ">  <div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"> <label><?php echo $i; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->product_name; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->cat_id; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->quantity; ?></label> </div></td>
														<td class=" "><div class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->price; ?></label> </div></td>
														<td class=" "><div style="white-space: nowrap;overflow: hidden;width: 300px;" name="description" class="col-lg-3 col-md-3 co-sm-3 col-xs-3"><label><?php echo $row->description; ?></label> </div></td>
													
														<td class=" ">
															<div class="col-lg-3 col-md-3 co-sm-3 col-xs-3">
																<a href="<?php echo base_url() . "Client/product_view/?id=" . $row->product_id ; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Detail">Detail
																
																</a>
															</div>
														</td>
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
