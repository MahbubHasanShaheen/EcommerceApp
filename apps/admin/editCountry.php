<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="apps/js/jquery.js">
</head>
<body>

<div class="row"  style=" margin: 10px">
<div class="col-md-10">
  <h1 style="text-align: center;">Edit Country</h1>
  <hr>
<script type="text/javascript">
	function hideMGS() {
		f = document.getElementById("success");
		f.style.display = "none";
	}

</script>

  <?php

 
   if(!isset($_GET['edit'])) {
    die();
    
   }
   $name = "";
   $id = $_GET['edit'];

  $c = new DBcontext();
   if ($_SERVER['REQUEST_METHOD']=="POST") {
   	$name=$_POST['name'];

   

    $sql="update country set name = '".$name."' where id =".$id;

   	if( $c->editData($sql)){
   	
      echo '<div class="success">Data Update Successfuliy<span style="float:right">

 	<a href="javascript:void(0)" onclick="hideMGS()">X</a>

 	</span></div>';

  }
   
   else{
   echo '<div class="error">Data Update Faild</div>';

   }

   $name = "";
 }
   else{
      $sql="select * from country where id=".$id;
    
     foreach ($c->getData($sql) as $value) {
      $name = $value['name'];
      
     }

   }


?>
  
    <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Country Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="name" value="<?php echo $name?>">
    
  </div>

 <button type="submit" class="btn btn-primary" name="btn">Update Data</button>

  </form>
<hr>
<a href="<?php appsConfig::URL('admin.php?admin=country')?>"><button class="btn btn-default">Back To List</button></a>
</div>
</div>

</body>
</html>