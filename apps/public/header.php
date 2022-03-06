<style type="text/css">
  form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<div class="header-top" style="background-color:#FF3E1D;">

  <div class="container">
  <div class="row">
  <div class="col-md-3 col-sm-3">
  <div class="logo">
    <a href="<?php appsConfig::URL('home')?>"><img src="http://localhost/sarichuri/img/logo2.png" height="80" width="80" style="margin-top:0px"></a>

  </div>
  </div>

    <div class="col-md-6 col-sm-6">
    <div class="hotline1" style="margin-top:2px;margin-bottom: 5px;">
    <h5 style="text-align:center;font-size: 14px;color: white;">Hotline : +8801760002135, 01866311326</h5>
     </div>
  <form class="example" action="<?php appsConfig::URL('search')?>" method="post">
    
  <input type="text" placeholder="Search.." name="search"/>
  <button type="submit" name="btn_search" style="min-height:44px"><i class="fa fa-search"></i></button>
</form>
  
 
     </div>
   
   

    <div class="col-md-3">
  <div class="sign"style="float: right;color:white;margin-top: 15px;">
   <span>
    <?php
      if(!isset($_SESSION['id'])){
        echo '<a href="'.appsConfig::Link('login').'"><span class="login1">Login</span></a>';
      }
      else{
        echo '<a href="'.appsConfig::Link('logout').'"><span class="logout1">Logout</span></a>';
        
      }


    ?>
</span> /
   <span>
   
      
      <?php   echo '<a href="'.appsConfig::Link('register').'"><span class="logout1">SignUp</span></a>'; ?>
    


</span>
   
  </div><br><br><br>

  <div class="chart-box" style="float:right;">
      
    <?php
    $sid = session_id();
    ?>

    <?php echo '<span style="color:white" class="my-icon cart-list-icon" onclick="chart(\''.$sid.'\')"><i class="fa fa-cart-plus" aria-hidden="true"></i></span>';?>

      

    <?php
    $c="0";
    $totalitem = 0;
    $totalprice = 0;
    $db = new DBContext();
    if($db->detailsData("cart",array("id","name","sid","price","discount","qty"),array("sid"=>session_id()))){

      foreach ($db->detailsData("cart",array("id","name","sid","price","discount","qty"),array("sid"=>session_id())) as $key => $value) {
        $totalitem++;
        $totalprice += (($value['price'] - (($value['price']/100)* $value['discount'])) * $value['qty']);
        $c++;
       
      }
      

    }

 
   
    echo '<a href="'.appsConfig::Link('cart').'" style="color:white;font-size:15px" href="" id="cartResult" class="item" onclick="chart(\''.$sid.'\')">'.$totalitem.' item(s) - &#2547; '.$totalprice.'.00 </a>';
     
    ?>
   
</div>

      </script>
      <div class="cart-hover-box" id="Chart-box" onmouseleave="hidebox()">

      <?php


      ?>

</div>
  </div>
</div>
  </div>
</div>

    
</div>


