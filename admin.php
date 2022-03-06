
<?php
session_start();
include_once 'system/config/appsConfig.php';

spl_autoload_register(function($classname){
include_once 'system/lib/'.$classname.'.php';
});


if(!isset($_SESSION['name'])){
header("Location:".appsConfig::Link('login'));
}


?>

<!DOCTYPE html>
<html>
<head>

	<title>sarichuri.com</title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="apps/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="apps/js/jquery.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
   <script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
 <style type="text/css" media="print">
  	@page { size: auto;  margin: 0mm; }
  	
  	@media print{
  		body *{
  			visibility: hidden;


  		}

  		.print-container, .print-container *{
  			visibility: visible;
  		}
  		.print-container{
  			position: absolute;
  			left: 40px;
  			top: -900px;
  			
  		
  		}
  	}
  </style>


</head>


<body>
  
  <div class="row" style="background-color: #00AFF0; min-height: 80px;">
   <div class="col-md-1">
   	<img src="img/logo2.png" height="100" width="200">
   </div>

  <div class="col-md-7">
   <h1 style="text-align: right; color: gray; text-shadow: 3px 0px 3px black; font-weight: bold;">Administrator Dashboard</h1>
  </div>

  <div class="col-md-4">

  <a href="<?php appsConfig::URL('admin.php?admin=logout')?>" style="float: right; color: white;"><button class="btn btn-primary" style="margin-top: 20px; margin-right: 30px;">LOGOUT</button></a><br>
  <a href="<?php appsConfig::URL('admin.php?admin=editPassword')?>" style="float: right; margin-right: 10px"><button class="btn btn-primary" style="background-color: green">Change Password</button></a>
   
 </div>
  	
  </div>

<div class="row">
<!-- start Left section -->
	<div class="col-md-2">
	<div class="left-admin"  style="padding-top: 60px">
     <div class="admin-img">
	<img src="apps/design/admin.PNG" height="140" width="140">
	
	</div>
	<h3 style="text-align: center; font-weight: bold; text-shadow: 2px 0px 2px black">Mahbul Hasan</h3>
	
  <section class="admin">
	<ul>
		<li style="border-top: 1px dashed white"><a href="<?php appsConfig::URL('admin.php?admin=home')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>HOME</a></li>

		<li><a href="<?php appsConfig::URL('admin.php?admin=country')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>COUNTRY</a></li>

		<li><a href="<?php appsConfig::URL('admin.php?admin=city')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>CITY</a></li>

		<li><a href="<?php appsConfig::URL('admin.php?admin=category')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>CATEGORY</a></li>

		<li><a href="<?php appsConfig::URL('admin.php?admin=subcategory')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>SUBCATEGORY</a></li>
		
		<li><a href="<?php appsConfig::URL('admin.php?admin=product')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>PRODUCT</a></li>

		<li><a href="<?php appsConfig::URL('admin.php?admin=images')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>PRODUCT IMAGES</a></li>

		<li><a href="<?php appsConfig::URL('admin.php?admin=gallary')?>"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>GALLARY IMAGES</a></li>
		  
		<li><a href="<?php echo appsConfig::URL('admin.php?admin=displayAdmin')?>">ADMIN INFO</a></li>
		<li><a href="<?php echo appsConfig::URL('admin.php?admin=displayUser')?>">USER INFO</a></li>
		<li><a href="<?php echo appsConfig::URL('admin.php?admin=orders')?>">ORDER</a></li>
		
	</ul>
		</section>
	</div>
	</div>
<!-- End Left Section -->

<!-- start right section -->
	<div class="col-md-10">
	   <div class="right-admin">
	   		<?php

            appsConfig::AdminBody();

	   		?>
	   </div>
		</div>
</div>



<div class="container-fluid">
<div class="row" style="background-color: deepskyblue; padding: 10px">

<div class="col-md-12 col-md-offset-1">
<p style="text-align: center; color: black">copyright@<?php echo Date('Y');?></p>
</div>
</div>
</div>
</body>
</html>