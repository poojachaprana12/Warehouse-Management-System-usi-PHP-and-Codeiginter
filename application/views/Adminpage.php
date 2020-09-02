
<div id="page-wrapper" class="page-wrapper-cls">
  <div id="page-inner">
    <!-- Button trigger modal -->
      <div class="row">
      <div class="col-md-12">
        <h3 class="page-head-line"><i class="glyphicon glyphicon-home"></i> Admin  <?php echo $adminname=$_SESSION['adminName'];	 ?>--  <?php echo date("F j, Y, g:i a");?></h3> 
     <?php  $adminid= $_SESSION['adminID']; $adminname=$_SESSION['adminName'];	 ?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="row">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  //echo $c_user['total']; ?> </h2>
          <p class="text-muted">Users</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php // echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categories</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-shopping-cart"></i>
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
