<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='apps/js/jquery-1.8.3.min.js'></script>
	<script src='apps/js/jquery.elevatezoom.js'></script>
</head>
<body>

   <script type="text/javascript">
	function Print(){
		window.print();
	}
</script>


<?php
if(!isset($url[1])){
die();
}

$id = $url[1];

$db = new DBContext();
$imgName = "";
$imgId = 0;
//$sql = "select * from disproduct where id = ".$id;





 $sql= "select disproduct.*,category.name as ctname from product left join category on disproduct.categoryid = category.id where disproduct.id=".$id;

if($db->getData($sql)){



foreach ($db->getData($sql) as $key => $value) {

$command = "select * from disimg where did = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
	$imgName = $item['name'];
	$imgId = $item['id'];
}



?>




<div class="container details" style="margin-top: 10px;">
<div class="row">

<div class="col-md-4">
<div class="productimage-details">
	<img src="<?php appsConfig::URL('apps/photo/'.$imgId."_".$imgName)?>">



</div>
</div>

<div class="col-md-8">
	<table>
		<tr>
			<td width="20%">Product name</td>
			<td width="5%">:</td>
			<td width="75%"><?php echo $value['name']?></td>
		</tr>

		<tr>
			<td>Product Price</td>
			<td>:</td>
			<td><?php echo $value['price']?> Taka </td>
		</tr>


		<tr>
			<td>Product Discount</td>
			<td>:</td>
			<td><?php echo $value['discount']?> %</td>
		</tr>




		<tr>
			<td>Product Category</td>
			<td>:</td>
			<td><?php echo $value['ctname'];?></td>
		</tr>

		<tr>
			<td>Product Description</td>
			<td>:</td>
			<td><?php echo $value['description'];?></td>
		</tr>

		<tr>
			<td colspan="5">
			<form action="<?php appsConfig::URL('discountDetails/'.$value['id'])?>" method="post">
				<input type="number" name="qty" value="1" style="width: 60px;">
			<button class="btn btn-primary" name="btn_cart" type="submit">Add to Cart</button>
			</form>
			
			<a href="javascript:void(0)" onclick="Print()"><button class="btn btn-default">Print</button></a></td>

			<a href="<?php appsConfig::URL('cart')?>""><button class="btn btn-default">Back To Cart Show</button></a></td>
		</tr>




	</table>
</div>
</div>


<div class="row" style="margin-top: 50px;">


<?php
$command = "select * from disimg where did = ".$value['id'];
foreach ($db->getData($command) as $item) {
	echo '
	<div class="col-md-2">
	<div class="all-image">
	<img src="'.appsConfig::Link('apps/photo/'.$item['id'].'_'.$item['name']).'" />
	
	</div>
	</div>';
}

?>









</div>




</div>

<?php 


if(isset($_POST['btn_cart'])){
	$qty = $_POST['qty'];
	$pname = $value['name'];
	$pprice = $value['price'];
	$psid = session_id();
	$did = $value['id'];
	$pdiscount = $value['discount'];
	$scommand = "insert into cart(did,sid,name,price,discount,qty) values(".$did.",'".$psid."','".$pname."',".$pprice.",".$pdiscount.",".$qty.")";
	$db->addData($scommand);
	header("Location:".appsConfig::Link('discountDetails/'.$did));
}






} //end foreach loop

	}
	else
	{
	 	print_r($db->Error);

	} ?>



<hr>


  










</body>
</html>



















