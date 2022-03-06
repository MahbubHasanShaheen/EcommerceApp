<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="apps/js/jquery.js">
</head>
<body>
  <h1 style="text-align: center;">Create City</h1>
  <hr>
<script type="text/javascript">
	function hideMGS() {
		f = document.getElementById("success");
		f.style.display = "none";
	}

</script>

  <?php
   $c=new DBcontext();
   if ($_SERVER['REQUEST_METHOD']=="POST") {
   	$name = $_POST['name'];
    $countryid = $_POST['countryid'];
    

   	$sql = "insert into city(name,countryid) values('".$name."', ".$countryid.")";
   	if( $c->addData($sql))
   	
      echo '<div class="success">Data Saved Successfuliy<span style="float:right">

 	<a href="javascript:void(0)" onclick="hideMGS()">X</a>

 	</span></div>';
   }
   else{
   echo '<div class="error">Data Insert Faild</div>';

   }







  ?>
  
    <form action="" method="post">
   <div class="form-group">
    <label for="exampleInputEmail1">City Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Country Name...." name="name">
    
  </div>





 <div class="form-group">
    <label for="exampleInputEmail1">Country Name</label>
    <select class="form-control" name="countryid">
      <option value="0">Select</option>
      <?php
    $db = new DBcontext();
    $sql = "select * from country";
   
    foreach ($db->getData($sql) as $value) {
     echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
      
     }





      ?>

    </select>
    
  </div>

 <button type="submit" class="btn btn-primary" name="btn">Submit</button>



  </form>
<hr>
<a href="<?php appsConfig::URL('admin.php?admin=city')?>"><button class="btn btn-default">Back To List</button></a>

</body>
</html>