
<div class="row" style="margin-top: 50px;">
<div class="col-md-12">
<div class="cart">

<div class="container" style="width: 90%; margin: 0px auto;" >
<table>
	<tr>
		<th>Sl</th>
		<th>Name</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Quantity</th>
		<th>Action</th>

	</tr>


<?php
$db = new DBContext();


if(isset($_POST['delete'])){
	$cid = $_POST['id'];
	$sssql = "delete from cart where sid = '".session_id()."' and id = ".$cid;
	$db->deleteData($sssql);
}



if(isset($_POST['Update'])){
	$qty = $_POST['qty'];
	$cid = $_POST['id'];
	$sssql = "update cart set qty = $qty where sid = '".session_id()."' and id = ".$cid;
	$db->deleteData($sssql);
}






$i = 1;
$c = 0;
$csql = "select * from cart where sid = '".session_id()."'";
foreach ($db->getData($csql) as $value) {

echo '	<tr>
		<td>'.$i++.'</td>
		<td>'.$value['name'].'</td>
		<td>'.($value['price']*$value['qty']).' BDT </td>
		<td>'.$value['discount'].' %</td>
		<td>
			<form method="post" action="">
			<input type="hidden" name="id" value="'.$value['id'].'">
				<input type="number" name="qty" value="'.$value['qty'].'">
				<input type="submit" name="Update" value="Update" class="btn btn-primary">
			</form>
		</td>
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





		



</table>







<a href="<?php appsConfig::URL('home');?>"><button class="btn btn-primary" style="float: left; margin-top: 50px; margin-left: 150px;">Shop Agin</button></a>

<form action="" method="post">
<button class="btn btn-success" style="float: right; margin-top: 50px; margin-right: 150px;" type="submit" name="btn_order">Order</button>
</form>
</div>
</div>
</div>
</div>

<hr>