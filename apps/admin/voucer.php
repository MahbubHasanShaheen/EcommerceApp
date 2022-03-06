
<script type="text/javascript">
	function PrintVoucher() {
		window.print();
	}
</script>



<div class="container">
<div class="row" style="width:95%;">
	<button class="btn btn-default" onclick="PrintVoucher()" style="float: right; margin: 18px; ">Print</button>
</div>

	<div class="row print-container" style="width: 90%; margin:5px auto;padding: 10px;">
	
	<h2 style="text-align: center; padding-right: 60px; color: brown;margin-bottom:40px">sarichuri.com</h2>

<div class="vaucher">
  <table class="table">
<h5 style=" padding-left: 0px"> Date   :<?php echo  date("d/m/Y") . "<br />"; ?></h5>
    <tbody>
    

      <?php

  $c= new DBContext();


 $id = $_SESSION['id'];
$sql = "select * from user1 where id = ".$id;
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '
        
        <tr>
          <th>Customer Name</th>
           <td style="width:200px">:</td>
          <td>'.$value['name'].'</td>
       </tr>



             <tr>
          <th>Email Address </th>
           <td style="width:200px">:</td>
          <td>'.$value['email'].'</td>
       </tr>



         
          <tr>
          <th>Phone No</th>
           <td style="width:200px">:</td>
          <td>'.$value['contact'].'</td>
         </tr>

             <tr>
          <th>Address</th>
           <td style="width:200px">:</td>
          <td>'.$value['address'].'</td>
       </tr>




    ';
  }







      ?>


    </tbody>

  </table>





<div class="order">
  <h3 style="text-align:center;">Invoice</h3>
<table class="table table-striped table-bordered">
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

echo '	<tr>
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
<br>
<hr>
<div class="row">
  <div class="col-md-6">
  <h5 style="border-top: 2px dotted black;width:100px;">Customer Sign</h5>
  </div>
 
 <div class="col-md-6">
 <h5 style=" border-top: 2px dotted black; width: 100px; float: right;">Athour Sign</h5>
 </div>
	
</div>

</div>
</div>
