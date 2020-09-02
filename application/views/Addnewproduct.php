<div id="page-wrapper" class="page-wrapper-cls">
	<div id="page-inner">
	<!-- Button trigger modal -->
		<div class="row">
			<div class="col-md-12">
			<?php echo form_open_multipart('Admin/addnewproductdetail'); ?>

			<input type="hidden" name="did" value="">
			<?php $message = $this->session->flashdata('item'); ?>
			<div class="<?php echo $message['class']?>"  style="text-align: center; color: green;"><?php echo $message['message']; ?></div>

				<div class="panel-body">
					<div class="container-fluid">
					
						<div class="form-group">

							<label>Product Name</label><input type="text" name="pname" class="form-control"  value="" required> 
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group">
									<span class="input-group-addon">
									<i class="glyphicon glyphicon-th-large"></i>
									</span>
									
									<select name="pcategory" id="category" class="form-control" required>
										<option value="" readonly>Choose Category</option>
										<?php 
										if($category->num_rows() > 0 ) 
										{
										$i=1;
											foreach($category-> result() as $list)
											{
										?>
											<option value="<?php echo $list->cat_id;?>"> <?php echo $list->cat_name; ?></option>

										<?php 
											}
										}

										?>
									</select>

									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
									<span class="input-group-addon">
									<i class="glyphicon glyphicon-shopping-cart"></i>
									</span>
									<input type="number" class="form-control" name="pquantity"  placeholder="Product Quantity" required>
								</div>
								</div>
							
								<div class="col-md-4">
									<div class="input-group">
									<span class="input-group-addon">
									<i class="glyphicon glyphicon-th-large"></i>
									</span>
									<input type="number" class="form-control" name="price" placeholder="Price" required>
									
									</div>
								</div>
							</div>
						</div>
						 
						<div class="form-group" required>
							<label>Description</label>
							<textarea name="description" class="form-control"></textarea>
						</div> 

						
						
						<input type="hidden" name="status"  class="form-control" value="3">

						<div class="row">

							<input type="submit" name="submit" value="Add" class="btn btn-info center-block" style="margin-left: 352px;">
							<input type="button" style="margin-top: -34px;" class="btn btn-info center-block" value="Cancel" name="Cancel" onclick="window.location='<?php echo base_url().'Admin/product_list_view';?>'">
						</div>

					</div>


				</div>
			</form>
			</div>

		

		</div>
	</div>

<!-- /. PAGE INNER  --> 
</div>
  <!-- /. PAGE WRAPPER  --> 

