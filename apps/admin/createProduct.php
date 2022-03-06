




<h1>Create Product</h1>
<hr>
<script type="text/javascript">
	function hideMGS() {
		f = document.getElementById("success");
		f.style.display = "none";
	}

</script>




<div class="row">
<div class="col-md-8">

<?php
$c = new DBContext();
if($_SERVER['REQUEST_METHOD'] == "POST"){



$pcode = $_POST['pcode'];
$name = $_POST['name'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$qty = $_POST['qty'];
$description = $_POST['description'];
$categoryid = $_POST['categoryid'];




$sql = "insert into product(pcode,name,price,discount,qty,description,categoryid) values( '".$pcode."','".$name."',".$price.", ".$discount.",".$qty.", '".$description."',".$categoryid.")";





 if($c->addData($sql)){

  //$subsSql = "select * from subscribe";
  //foreach ($db->getData($subsSql) as  $value) {
   // $to = $value;
    //$subject = "Project.com";
    //$message ='our product name : '.$name;
    //$email ="office@csltraining.com";
    //$header ="From:$email";
   // mail($to,$subject,$message,$header);



  //}










 	echo '<div class="success" id="success">Data Saved Successfully <span style="float:right">

 	<a href="javascript:void(0)" onclick="hideMGS()"><i class="fa fa-times" aria-hidden="true"></i></a>

 	</span></div>';
 }else{
 	echo '<div class="error">Data Saved fail</div>';
 }



}

?>








<form action="" method="post">


<div class="form-group">
    <label for="exampleInputEmail1">Product Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pcode">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
  </div>


  

    <div class="form-group">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="price">
  </div>



    <div class="form-group">
    <label for="exampleInputEmail1">Discount Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="discount">
  </div>


   <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="qty">
  </div>


    <div class="form-group">
    <label for="exampleInputEmail1">Product Descirption</label>
    <textarea class="form-control" name="description" style="min-height: 100px;">

    </textarea>

        <script>
            CKEDITOR.replace('description');
    </script>
  </div>



  <div class="form-group">
    <label for="exampleInputEmail1">Cateogry name</label>
    <select name="categoryid" class="form-control">
    	<option value="0">Select</option>
    	<?php
    	$db = new DBContext();
    	$sql = "select * from category";
    	foreach ($db->getData($sql) as  $value) {
    		echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    	}

    	?>

    </select>
  </div>




 <button type="submit" class="btn btn-primary" name="btn">Submit</button>

  </form>



</div>

</div>

<hr>
<a href="<?php appsConfig::URL('admin.php?admin=product')?>">Back to List</a>
<hr style="height: 20px">

