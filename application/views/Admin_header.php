<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="noindex, nofollow" />
<title>Admin</title>
<!-- BOOTSTRAP STYLES-->
<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME ICONS STYLES-->
<link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
<!--CUSTOM STYLES-->
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/bootstrap-dialog.css" rel="stylesheet" />
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-dialog.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/grids.min.js"></script>

</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a  class="navbar-brand" href="<?php echo base_url(); ?>admin">Welcome Admin <?php //echo $list->username; ?></a> </div>
  <div class="notifications-wrapper">
  	<div class="container-fluid">
    <div class="row">
  
     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-11 pull-right">
    <a href="<?php echo base_url();?>admin/logout" class="btn btn-primary"><i class="fa fa-sign-out"></i> Logout</a> </div>
    </div>
    </div>
  </div>
</nav>
<!-- /. NAV TOP  -->
<nav  class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
           <li> <a href="<?php echo base_url(); ?>admin/index" id="home" onclick="menuactive(this);"><i class="fa fa-home "></i>Home</a></li>
		   <li> <a href="<?php echo base_url(); ?>admin/addnewuser" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Add User</a> </li>
			<li> <a href="<?php echo base_url(); ?>admin/user_list_view" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Edit User List</a> </li>
		   <li> <a href="<?php echo base_url(); ?>admin/addnewproduct" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Add Product</a> </li>
			<li> <a href="<?php echo base_url(); ?>admin/product_list_view" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i> Product List</a> </li>
            <li> <a href="<?php echo base_url(); ?>admin/addnewcategory" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Add New Category</a> </li>

             
     <!--<li> <a href="#" id="india"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Manage category<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" style="height: 0px;">
			<li> <a href="<?php ////echo base_url(); ?>admin/addnewcategory" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Add New Category</a> </li>
			<li> <a href="<?php //echo base_url(); ?>admin/category" id="newdoc"  onclick="menuactive(this);"><i class="fa fa-plus-square"></i>Edit Category</a> </li>
		  
         
              </ul>
      </li>-->
    
	
    
    </ul>
  </div>
</nav>
<!-- /. SIDEBAR MENU (navbar-side) -->