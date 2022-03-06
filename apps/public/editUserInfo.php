
  
    <form action="" method="post">
   <div class="form-group">
    <label for="exampleInputEmail1">Product Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pcode" value="<?php echo $pcode  ?>">
    
  </div>


<div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo $name  ?>">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="<?php echo $price  ?>">
    
  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Discount</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="discount" value="<?php echo $discount  ?>">
    
   </div>



  <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="qty" value="<?php echo $qty ?>">
    
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Product Descirption</label>
    <textarea class="form-control" name="description" rows="3">

    </textarea>

        <script>
            CKEDITOR.replace('description');
    </script>
  </div>

 



 <button type="submit" class="btn btn-primary" name="btn">Upadte Data</button>



  </form>



  <?php

    
   if(!isset($_GET['edit'])) {
    die();
    
   }
   
   $id = $_GET['edit'];

   $name="";
   $pid=0;


   $c=new DBContext();
   if ($_SERVER['REQUEST_METHOD']=="POST") {
    $pcode = $_POST['pcode'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    
    $qty = $_POST['qty'];
    $description = $_POST['description'];
    
    $categoryid = $_POST['categoryid'];
    

   
  $sql="update product set pcode = '".$pcode."',   name = '".$name."', price = '".$price."', discount = '".$discount."', qty = '".$qty."', description = '".$description."', categoryid = ".$categoryid." where id =".$id;




    if( $c->editData($sql))
    
      echo '<div class="success">Data Saved Successfuliy<span style="float:right">

  <a href="javascript:void(0)" onclick="hideMGS()">X</a>

  </span></div>';
  
   else{
   echo '<div class="error">Data Update Faild</div>';

   }
}

    else{
      $sql="select * from product where id=".$id;
    
     foreach ($c->getData($sql) as $value) {
      
      $pcode = $value['pcode'];
      $name = $value['name'];
      $price = $value['price'];
      $discount = $value['discount'];
      $qty = $value['qty'];
      $description = $value['description'];
      $categoryid = $value['categoryid'];
     }

  }





  ?>