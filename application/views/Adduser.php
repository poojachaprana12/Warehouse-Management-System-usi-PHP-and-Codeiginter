<div id="page-wrapper" class="page-wrapper-cls">
	<div id="page-inner">
    <!-- Button trigger modal -->
	<div class="row">
		<div class="col-md-12">
		<?php echo form_open_multipart('Admin/addnewuserdetail'); ?>
			<input type="hidden" name="did" value="">
			<?php $message = $this->session->flashdata('item'); ?>
			<div class="<?php echo $message['class']?>"  style="text-align: center; color: green;"><?php echo $message['message']; ?></div>
     		<div class="panel-body">
				<div class="container-fluid">
					<div class="form-group">
						<label>Name</label><input type="text" name="name" class="form-control"  value="" required> 
					</div>
					
					<div class="form-group"> 
						<label>Username</label><input type="text" name="user" id="user" class="form-control" value="" required>   
					</div>                  
					
					<div class="form-group">
						<label>Password</label><input type="text" name="password"   class="form-control" value=""  id="password" size="20" required>    
					</div>
					
					<div class="form-group">
						<label>Role</label>
						<select name="role" id="role" class="form-control" required>
							<option value="1" > Admin</option>
							<option value="2" > Client</option>
						</select>
					</div>
					
					<div class="form-group" required>
						<label>Image</label><input type="file" name="userfile"   class="form-control" value=""  id="userfile" size="20" />    
					</div>
					
					<input type="hidden" name="status"  class="form-control" value="3">
					 
					<div class="row">
						<input type="submit" name="submit" value="Add" class="btn btn-info center-block" style="margin-left: 352px;">
						<input type="button" style="margin-top: -34px;" class="btn btn-info center-block" value="Cancel" name="Cancel" onclick="window.location='<?php echo base_url().'Admin/user_list_view';?>'">
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

