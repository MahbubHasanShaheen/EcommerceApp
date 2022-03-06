<?php
if(!isset($url[1])){
die();
}

$cid = $url[1];

?>



<div class="container-fluid">
<!--start porduct area-->
<div class="product-area">
<div class="row" style="padding: 10px;">
<?php
$db = new DBContext();
$imgName = "";
$imgId = 0;
$sql = "select * from product where categoryid = ".$cid;

foreach ($db->getData($sql) as $key => $value) {

$command = "select * from images where pid = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
	$imgName = $item['name'];
	$imgId = $item['id'];
}


	echo '
    <a style="text-decoration: none;" href="'.appsConfig::Link('details/'.$value['id']).'">
    <div class="col-md-3" >
    <div class="product-box" style="height:280px;width:220px;margin:50px auto;padding:3px">
    <figure>';
      

      if($imgName != ""){
        echo '<img src="'.appsConfig::Link('apps/productImage/'.$imgId.'_'.$imgName).'" alt="'.$value['name'].'" title="'.$value['name'].'" height="180">';

      }else{
        echo '<img src="'.appsConfig::Link('apps/productImage/download.jpg').'" alt="'.$value['name'].'" title="'.$value['name'].'">';


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



?>



 


</div>
</div>
</div>


<!--end porduct area-->















