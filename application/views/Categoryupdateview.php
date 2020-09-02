<div id="page-wrapper" class="page-wrapper-cls">
	<div id="page-inner">
	<!-- Button trigger modal -->
		<div class="row">
			<div class="col-md-12">

			<?php echo form_open_multipart('Admin/edit_categorydetails'); ?>
			<?php $message = $this->session->flashdata('item'); ?>
			<div class="<?php echo $message['class']?>"  style="text-align: center; color: green;"><?php echo $message['message']; ?></div>

			<?php 
			if($category_updateview_id->num_rows() > 0 ) 
			{
				$i=1;
				foreach($category_updateview_id-> result() as $list)
				{
				//print_r($query);
				//echo $list[id];
			?>
				<input type="hidden" name="did" value="<?php echo $list->cat_id; ?>">
				<div class="panel-body">
					<div class="container-fluid">
						<div class="form-group"> 
							<label>Name</label><input type="text" name="cname"  class="form-control"  value="<?php echo $list->cat_name; ?>" >   
						</div>
						
						<div class="row">
							<input type="submit" id="submit" name="submit" class="btn btn-info center-block" value="Update" style="margin-left: 352px;">
							<input type="button" style="margin-top: -34px;" class="btn btn-info center-block" value="Cancel" name="Cancel" onclick="window.location='<?php echo base_url().'Admin/addnewcategory';?>'">
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
