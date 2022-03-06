



<div class="container">
	<div class="row">
		<a href="<?php appsConfig::URL('welcome');?>"><button class="btn btn-default" style="margin:10px">Back</button></a>
	<button onclick="window.print();" class="btn btn-default" style="float:right;margin-right:40px;margin-top: 10px;">Print</button>
</div>
<div class="row print-container">
<div class="vowcer2"   style="width: 95%; margin: 5px auto;border: 1px solid silver; padding: 14px; margin-top: 12px">
 

	<div class="col-md-2 col-sm-2">
		<img src="img/logo2.png" class="pdflogo" height="50" width="100">
	</div>

	<div class="col-md-10">
   <div class="add" style="width:25%; margin:0 auto; ">
		<h4>CLIENT INVOICE<br>Date: <?php echo date('d-m-y')?><br>sarichuri.com<br>Mirpur, Dhaka-1210</h4>
	 </div>
	 <hr>
	</div>
	

<div class="row">
<div class="col-md-10">

 <table class="table table-striped">

    <tbody>
    
   <?php

  $c= new DBContext();


 $id = $_SESSION['id'];
$sql = "select * from user1 where id = ".$id;
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '
        
        <tr>
          <td>Customer Name</td>
           <td style="width:200px">:</td>
          <td>'.$value['name'].'</td>
       </tr>



             <tr>
          <td>Email Address </td>
           <td style="width:100px">:</td>
          <td>'.$value['email'].'</td>
       </tr>

            

            
          <tr>
          <td>Phone No</td>
           <td style="width:100px">:</td>
          <td>'.$value['contact'].'</td>
       </tr>


             <tr>
          <td>Address</td>
           <td style="width:100px">:</td>
          <td>'.$value['address'].'</td>
       </tr>



    ';
  }



      ?>


    </tbody>

  </table>


</div>

</div>

<div class="row">
<div class="order">
<table  style="">
	<tr style="background-color: #EFEFEF">
		<th>Sl. No</th>
		<th>Name</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Quantity</th>
		<th>SubTotal</th>

	</tr>


<?php
$db = new DBContext();


$i = 1;
$c = 0;
$sum = 0;
$csql = "select * from orders where sid = '".session_id()."'";
foreach ($db->getData($csql) as $value) {

$sum +=  (($value['pprice']-(($value['pprice'] * $value['pdiscount'])/100)) * $value['pqty']);

echo '<tr>
		<td>'.$i++.'</td>
		<td>'.$value['pname'].'</td>
		<td>'.$value['pprice'].' Taka</td>
		<td>'.$value['pdiscount'].' %</td>
		<td>'.$value['pqty'].' </td>
		<td>'.(($value['pprice']-(($value['pprice'] * $value['pdiscount'])/100)) * $value['pqty']).'.00</td>
  </tr>';

}





?>


	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th colspan="3" style="text-align: right; padding-right: 50px;"><span style="padding-right: 40px; ">Total :</span> <?php echo $sum;?>.00 Taka</th>
	</tr>

</table>


</div>



</div>
<hr><hr>
<div class="row">
  <div class="col-md-8">
    <h5 style="border-bottom:1px solid gray;width: 80px;">Issued By</h5>
    <h5>ATTN : Mahbul Hasan</h5>
    <h5>Executive (Sales)</h5>
    <h5>Sarichur.com</h5>
   
    
  	
  </div>

	<div class="col-md-4 col-sm-3">
		<div>
		  
		</div>

	</div>
	
</div>

</div>

</div>
<hr>
</div>