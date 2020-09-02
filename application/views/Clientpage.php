
<div id="page-wrapper" class="page-wrapper-cls">
  <div id="page-inner">
    <!-- Button trigger modal -->
      <div class="row">
      <div class="col-md-12">
        <h2 class="page-head-line"><i class="glyphicon glyphicon-home"></i> Welcome Client --  <?php echo date("F j, Y, g:i a");?></h2> 
     
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="row">

			<div class="col-md-4">
			   <div class="panel panel-box clearfix">
				 <div class="panel-icon pull-left bg-red">
				 <a href="<?php echo base_url() . "Client/categoryview"?>">
				  <i class="glyphicon glyphicon-list"></i></a>
				</div>
				<div class="panel-value pull-right">
				  <h2 class="margin-top"> <?php // echo $c_categorie['total']; ?> </h2>
				  <p class="text-muted">Categories</p>
				</div>
			   </div>
			</div>
			<div class="col-md-4">
			   <div class="panel panel-box clearfix">
				 <div class="panel-icon pull-left bg-blue">
				  <a href="<?php echo base_url() . "Client/product_list_view"?>">
				  <i class="glyphicon glyphicon-shopping-cart"></i></a>
				</div>
				<div class="panel-value pull-right">
				  <h2 class="margin-top"> <?php // echo $c_product['total']; ?> </h2>
				  <p class="text-muted">Products</p>
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
