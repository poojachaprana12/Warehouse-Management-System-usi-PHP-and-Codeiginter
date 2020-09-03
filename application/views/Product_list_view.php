<div id="page-wrapper" class="page-wrapper-cls">
	<div id="page-inner">
	<!-- Button trigger modal -->
		<div class="row">
			<div class="col-md-12">

			<?php echo form_open_multipart('Admin/edit_productdetails'); ?>
			<?php $message = $this->session->flashdata('item'); ?>
			<div class="<?php echo $message['class']?>"  style="text-align: center; color: green;"><?php echo $message['message']; ?></div>

			<?php 
			if($product_view_id->num_rows() > 0 ) 
			{
				$i=1;
				foreach($product_view_id-> result() as $list)
				{
				//print_r($query);
				//echo $list[id];
			?>
				<input type="hidden" name="did" value="<?php echo $list->product_id; ?>">
				<div class="panel-body">
					<div class="container-fluid">
						<div class="form-group"> 
							<label>Prduct Name</label><input type="text" name="pname"  class="form-control"  value="<?php echo $list->product_name; ?>" required>   
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control" required><?php echo $list->description; ?></textarea>
						</div>
						
						<div class="form-group">
								<div class="row">
								<div class="col-md-4">
									<div class="input-group">
									<span class="input-group-addon">
									<i class="glyphicon glyphicon-th-large"></i>
									</span>
									<select name="pcategory" id="pcategory" class="form-control" required>
										<option value="2" readonly>Choose Category</option>
										<?php 
										if($category->num_rows() > 0 ) 
										{
										$i=1;
											foreach($category-> result() as $list1)
											{
										?>
											<option <?php if($list->cat_id==$list1->cat_id) { echo 'selected="selected"';} ?> value="<?php echo $list1->cat_id;?>" > <?php echo $list1->cat_name; ?></option>
							
										<?php 
											}
										}?>
									</select>

									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
									<span class="input-group-addon">
									<i class="glyphicon glyphicon-shopping-cart"></i> In Stock
									</span>
									<input type="text" class="form-control" name="pquantity" value="<?php echo $list->quantity; ?>" placeholder="Product Quantity" required>
								</div>
								</div>
							
								<div class="col-md-4">
									<div class="input-group">
									<span class="input-group-addon">
									<i class="glyphicon glyphicon-th-large"></i> Price
									</span>
									<input type="number" class="form-control" name="price" value="<?php echo $list->price; ?>" placeholder="Price" required>
									
									</div>
								</div>
							</div>
							</div>
						
						<hr>  
						
						
						<div class="row">
							<input type="submit" id="submit" name="submit" class="btn btn-info center-block" value="Update" style="margin-left: 352px;">
							<input type="button" style="margin-top: -34px;" class="btn btn-info center-block" value="Cancel" name="Cancel" onclick="window.location='<?php echo base_url().'Admin/product_list_view';?>'">
						</div>
					</div>
				</div>

			<?php 
				} 
			} ?>
					
			</form>
			</div>
		</div>


	<!-- /. PAGE INNER  --> 
	</div>
<!-- /. PAGE WRAPPER  --> 
</div>
