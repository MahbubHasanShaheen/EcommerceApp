<h1 style="text-align: center;">Orders page</h1><hr>

<hr>
<script type="text/javascript">
	$(document).ready(function(){
    $('#country').DataTable();
});
</script>


<table id="country" class="display" style="width: 100%">
	<thead>
		<tr style="background-color: #29b8c2; border-top:2px solid black;">
			<th>Sl</th>
			<th>User Id</th>
			<th>Product Name</th>
            <th>Product Price</th>
			<th>Discount</th>
			<th>Quantity</th>
			<th>Date & Time</th>
			<th>Action</th>
		</tr>
	</thead>


	<tbody>


		<?php
		$c = new DBContext();

		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			$command ="delete from orders where userid = ".$id;
			$c->deleteData($command);
		}





		$i=1;
		

		 $sql= "select * from orders ";
		foreach ($c->getData($sql) as  $value) {
			echo '		<tr>
			<td>'.$i++.'</td>
            <td>'.$value['userid'].'</td>
			<td>'.$value['pname'].'</td>
			<td>'.$value['pprice'].'</td>
			<td>'.$value['pdiscount'].'</td>
			<td>'.$value['pqty'].'</td>
			<td>'.$value['date'].'</td>
			
			<td>
		
			<a href="'.appsConfig::Link('admin.php?admin=orders&delete='.$value['userid']).'"><button class="btn btn-danger">Delete</button></a>
			<a href="'.appsConfig::Link('admin.php?admin=voucer&id='.$value['id']).'"><button class="btn btn-success">Voucher</button></a>

			</td>
		</tr>';
		}




		?>



		
	</tbody>



</table>









