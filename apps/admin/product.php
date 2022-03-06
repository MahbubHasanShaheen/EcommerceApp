
<div class="row">
  <div class="col-md-2">
  <a href="<?php appsConfig::URL('admin.php?admin=createProduct')?>"><button class="btn btn-success" style="margin-top:30px">Create Data</button></a>
  </div>

  <div class="col-md-8">
  <h1 style="text-align: center;">Product page</h1>
  </div>
</div>



<hr>
<script type="text/javascript">
	$(document).ready(function(){
    $('#country').DataTable('display');
});
</script>


<table id="country" class="display" style="width: 100%">
	<thead>
		<tr style="background-color: #29b8c2; border-top:2px solid black;">
			<th>Sl</th>
			<th>Product Code</th>
			<th>Name</th>
      <th>Price</th>
			<th>Discount</th>
			<th>Quantity</th>
			<th>Description</th>
			<th>Category</th>
			
			<th>Action</th>
		</tr>
	</thead>


	<tbody>


		<?php
		$c = new DBContext();

		if(isset($_GET['delete'])){
			$id = $_GET['delete'];
			$command ="delete from product where id = ".$id;
			$c->deleteData($command);
		}





		$i=1;
		

		 $sql= "select product.*,category.name as ctname from product inner join category on product.categoryid = category.id";
		foreach ($c->getData($sql) as  $value) {
			echo '		<tr>
			<td>'.$i++.'</td>

			<td>'.$value['pcode'].'</td>
			<td>'.$value['name'].'</td>
			<td>'.$value['price'].'</td>
			<td>'.$value['discount'].'</td>
			
			<td>'.$value['qty'].'</td>
			<td>'.$value['description'].'</td>
			<td>'.$value['ctname'].'</td>
			
			<td>
			<a href="'.appsConfig::Link('admin.php?admin=editProduct&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>




			<a href="'.appsConfig::Link('admin.php?admin=product&delete='.$value['id']).'"><button class="btn btn-danger">Delete</button></a>

			</td>
		</tr>';
		}




		?>



		
	</tbody>



</table>









