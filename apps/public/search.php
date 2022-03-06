
<?php

if(isset($_POST['btn_search'])){
	$_SESSION['search'] = $_POST['search'];
}
?>






<!--start porduct area-->
<div class="product-area" style="margin-top: 30px">
<div class="container">



  <div class="row">


<?php
$db = new DBContext();
$imgName = "";
$imgId = 0;
$sql = "select * from product where 
((name like '%".$_SESSION['search']."%' or price like '%".$_SESSION['search']."%') or description like '%".$_SESSION['search']."%')";

if($db->getData($sql)){

foreach ($db->getData($sql) as $key => $value) {

$command = "select * from images where pid = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
	$imgName = $item['name'];
	$imgId = $item['id'];
}


	
	 echo '
    <a style="text-decoration: none;" href="'.appsConfig::Link('details/'.$value['id']).'">
    <div class="col-md-3" >
    <div class="product-box" style="height:320px;margin:2px auto;">
    <figure>';
      

      if($imgName != ""){
        echo '<img src="'.appsConfig::Link('apps/productImage/'.$imgId.'_'.$imgName).'" alt="'.$value['name'].'" title="'.$value['name'].'" height="180">';

      }else{
        echo '<img src="'.appsConfig::Link('apps/productImage/download.jpg').'" alt="'.$value['name'].'" title="'.$value['name'].' height="220">';


      }
        
       echo '</figure>
       <div class="price">
       <div class="price-box">
    <div class="row">
    <div class="col-md-12">
    <p style="text-align:center">'.$value['name'].'</p>
    </div>

    <div class="col-md-12">
    <h4><span class="btn" style="color:brown; font-size:15px">&#2547;'.$value['price'].'.00</span><a class="btn" href="'.appsConfig::Link('details/'.$value['id']).'" style="float:right;font-weight:bold;background-color:#f36103">Add to Cart</a></h4>
    </div>
   </div>
    </div>
      
  
  

  

     
   
    </div>
    </div>
   </div>
    </a>';

}



}
else{
	echo '
  
  <div class="not" style="min-height:250px; width:250px; margin:0px auto; background-color:silver">
  <h2 style="padding-top:120px; text-align:center">Opps</h2>
  <h5 style="padding-top:10px; text-align:center">Products is not avaliable</h1>
  </div>
  
  ';
}


?>


   <!--start product box-->
    
    <!--end product box-->






 

  </div>
</div>
</div>



<!--end porduct area-->



</div>