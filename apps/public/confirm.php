
  <div class="container">
      
      

       <h3 style="text-align:center;">Please paid your bill</h3>
 
      <div class="payment" style="min-height:600px">
      <div class="row">
        <h3>Shipping Method</h3>
       <p>Shipping price in Dhaka - TK 100.00, Shipping price out of Dhaka - TK 150.00</p>  
      </div>
      <div class="pay_methods" >
        <h2 style="text-align:center;">Payment Method</h2>
     <div class="row" style="border:1px solid silver;padding: 6px; background-color:ghostwhite;">
    
    
       <div class="col-md-1">
      
    </div>
    <div class="col-md-2">
      <img src="img/pay3.jpg" width="160" height="100">
    </div>

    <div class="col-md-2">
      <img src="img/pay4.jpg" width="160" height="100">
    </div>

    <div class="col-md-2">
      <img src="img/pay5.jpg" width="160" height="100">
    </div>

    <div class="col-md-2">
      <img src="img/pay1.png" width="160" height="100">
    </div>

    <div class="col-md-2">
      <img src="img/pay2.png" width="160" height="100">
    </div>

     <div class="col-md-1">
      
    </div>
 </div>



 <div class="row">

<div class="cart" style="background-color: white; padding-top: 40px;">


<table style="width: 100%;">



<?php
$db = new DBcontext();







$i = 1;
$c = 0;
$csql = "select * from cart where sid = '".session_id()."'";

foreach ($db->getData($csql) as $value) {

echo ' 
  ';





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

    header("Location:".appsConfig::Link('login'));
  }

  






}

}





?>




    



</table>







<a href="<?php appsConfig::URL('home');?>"><button class="btn btn-default" style="float: left; margin-top: 50px; width:200px; color:brown; font-weight: bold;font-size: 16px; background-color:orange; margin-left: 150px; box-shadow: 1px 5px 10px black">CONTINUE SHOPPING</button></a>

<form action="" method="post">
<button class="btn btn-default" style="float: right; margin-top: 50px; margin-right: 150px; width:200px; color:red; font-weight: bold;font-size: 16px; background-color:deepskyblue; margin-left: 150px; box-shadow: 0px 5px 10px black" type="submit" name=""><a style="color:red"><a href="<?php appsConfig::URL('login');?>">CHEACKOUT</a></button>
</form>
</div>
</div>










</div>
  </div>

          </div>
       </div>

</div>



