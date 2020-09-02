<div class="container-fluid login-body">
  <div class="row text-center ">
    <div class="col-md-12"> <br />
      <br />
      <h2>Admin : Login</h2>
     
      <br />
    </div>
  </div>
  <div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
      <div class="panel panel-default">
      
        <div class="panel-body">
           <?php  //echo form_open('admin/login'); ?>
		   <?php $message = $this->session->flashdata('item'); ?>
			<div class="<?php echo $message['class'];?>"  style="text-align: center; color: green;"><?php echo $message['message']; ?></div>

		   <form action="<?php echo base_url()?>admin/login" method="POST">
            <br />
            <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
              <input type="text" class="form-control" placeholder="Your Username " required name="username"/>
         
            </div>
            
            <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
              <input type="password" class="form-control" required  placeholder="Your Password"  name="password"/>
           
            </div>
               <div class="form-group input-group">
              <input type="submit" class="btn btn-primary pull-right"  value="submit" name="submit"/>
           
            </div>
          
     
          </form>
                   
        </div>
      </div>
    </div>
  </div>
</div>
