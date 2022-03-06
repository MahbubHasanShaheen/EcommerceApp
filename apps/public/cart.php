<div class="container">
<div class="row">

<div class="cart" style="background-color: white; padding-top: 40px; min-height:300px">


<table style="width: 100%;">
	<tr>
		<th>Sl</th>
		<th>Product Name</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Action</th>

	</tr>


<?php
$db = new DBcontext();


if(isset($_POST['delete'])){
	$cid = $_POST['id'];
	$sssql = "delete from cart where sid = '".session_id()."' and id = ".$cid;
	$db->deleteData($sssql);
}



if(isset($_POST['update'])){
	$qty = $_POST['qty'];
	$cid = $_POST['id'];
	$ssql = "update cart set qty = $qty where sid = '".session_id()."' and id = ".$cid;
	$db->deleteData($ssql);
}


$i = 1;
$c = 0;
$csql = "select * from cart where sid = '".session_id()."'";

foreach ($db->getData($csql) as $value) {

echo '	<tr>
		<td>'.$i++.'</td>
		
		<td>'.$value['name'].'</td>
		<td>'.$value['price'].'</td>
		<td>'.$value['discount'].' %</td>
		<td>
			<form method="post" action="">
			<input type="hidden" name="id" value="'.$value['id'].'">
				<input type="number" name="qty" value="'.$value['qty'].'">
				<input type="submit" name="update" value="Update" class="btn btn-primary">
			</form>
		</td>

			<td>'.($value['price']*$value['qty']).' BDT </td>
		<td>
			<form method="post" action="">
				<input type="hidden" name="id" value="'.$value['id'].'">
				<input type="submit" name="delete" value="Delete" class="btn btn-danger">

			</form>
		</td>


	</tr>';

if(isset($_POST['btn_order'])){
	if(!isset($_SESSION['id'])){
	header("Location:".appsConfig::Link('confirm'));
	}
	else{
		$qty = $value['qty'];
		$pname = $value['name'];
		$pprice = $value['price'];
		$psid = session_id();
		$pdiscount = $value['discount'];
		$userid = $_SESSION['id'];
		$scommand = "insert into orders(sid,pname,pprice,pdiscount,pqty,userid) values('".$psid."','".$pname."',".$pprice.",".$pdiscount.",".$qty.",".$userid.")";
		$db->addData($scommand);

		$sqldelete = " delete from cart where sid = '".session_id()."'";
		$db->deleteData($sqldelete);

		header("Location:".appsConfig::Link('order'));
	}
 }

}



?>


<?php
$db = new DBContext();


$i = 1;
$c = 0;
$sum = 0;
$csql = "select * from cart where sid = '".session_id()."'";
foreach ($db->getData($csql) as $value) {

$sum +=  (($value['price']-(($value['price'] * $value['discount'])/100)) * $value['qty']);


}

?>

		
</table>


<p style="text-align:right; margin: 15px;">Total : <?php echo $sum;?>.00 Taka</p>

<a href="<?php appsConfig::URL('home');?>"><button class="btn btn-default" style="float: left; margin-top: 50px; color:whitesmoke; font-size: 16px;font-weight: bold; background-color:orangered; ">CONTINUE SHOPPING</button></a>

<form action="" method="post">
<button class="btn btn-success" style="float: right; margin-top: 50px;  color:white; font-weight: bold;font-size: 16px;" type="submit" name="btn_order">CHEACKOUT</button>
</form>
</div>
</div>


</div>
</div>
<br>
<br>
