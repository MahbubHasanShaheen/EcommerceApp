<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="apps/js/jquery.js">
</head>
<body>
  <h1 style="text-align: center;">Edit Subcategory</h1>
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
   
   $id = $_GET['edit'];

   $name="";
   $categoryid=0;


   $c=new DBcontext();
   if ($_SERVER['REQUEST_METHOD']=="POST") {
   	$name = $_POST['name'];
    $categoryid = $_POST['categoryid'];
    

   

     $sql="update scategory set name = '".$name."', categoryid = ".$categoryid." where id =".$id;

   	if( $c->editData($sql))
   	
      echo '<div class="success">Data Saved Successfuliy<span style="float:right">

 	<a href="javascript:void(0)" onclick="hideMGS()">X</a>

 	</span></div>';
  
   else{
   echo '<div class="error">Data Update Faild</div>';

   }
}

    else{
      $sql="select * from scategory where id=".$id;
    
     foreach ($c->getData($sql) as $value) {
      $name = $value['name'];
      $categoryid = $value['categoryid'];
      
     }

  }





  ?>
  
    <form action="" method="post">
   <div class="form-group">
    <label for="exampleInputEmail1">Subcategory Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo $name  ?>">
    
  </div>





 <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <select class="form-control" name="categoryid">
      <option value="0">Select</option>
      <?php
    $db = new DBcontext();
    $sql = "select * from category";
   
    foreach ($db->getData($sql) as $value) {

      if($categoryid==$value['id']){
       echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
      }

      else{
        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
      }
     
      
     }





      ?>

    </select>
    
  </div>

 <button type="submit" class="btn btn-primary" name="btn">Upadte Data</button>



  </form>
<hr>
<a href="<?php appsConfig::URL('admin.php?admin=subcategory')?>"><button class="btn btn-default">Back To List</button></a>

</body>
</html>