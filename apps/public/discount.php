  
<div class="container">
  <div class="row" style="margin-bottom:70px">

  <div class="col-md-12">
  <h2 style="text-align: center; color: darkred; padding: 20px; text-shadow:3px 0px 3px gray; font-weight: bold;font-size: 28px;">Discount Gallery</h2>
 <?php

$db = new DBContext();

$sql = "select * from product where pcode = '300'";

foreach ($db->getData($sql) as $key => $value) {
$imgName = "";
$imgId = 0;
$command = "select * from images where pid = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
    $imgName = $item['name'];
    $imgId = $item['id'];
}


    
    echo '
    <a style="text-decoration: none;" href="'.appsConfig::Link('details/'.$value['id']).'">
    <div class="col-md-3" >
    <div class="product-box" style="height:380px;margint-top:20px;padding:5px">
    <p style="width:62px;height:62px; background-color:#182430;color:gold;border-radius:50px; padding-top:25px">less.'.$value['discount'].'%</p>
    <figure>';
      
  
      if($imgName != ""){
        echo '<img src="'.appsConfig::Link('apps/productImage/'.$imgId.'_'.$imgName).'" alt="'.$value['name'].'" title="'.$value['name'].'" height="190" width="200" style="margin-left:30px">';

      }else{
        echo '<img src="'.appsConfig::Link('apps/productImage/download.jpg').'" alt="'.$value['name'].'" title="'.$value['name'].'">';


      }
        
       echo '</figure>
       <div class="price">
       <div class="price-box">
    <div class="row">
    <div class="col-md-12">
    <h5 style="text-align:center;color:black">'.$value['name'].'</h5>
  
   <h4><span class="btn" style="color:brown; font-size:13px">&#2547;<del>'.$value['price'].'.00<del></span>  <span class="btn" style="float:right;color:black">Now. $'.(($value['price']-(($value['price'] * $value['discount'])/100))).'.00</span></h4>
    <h3><a class="btn" href="'.appsConfig::Link('details/'.$value['id']).'" style="float:right;width:100%;font-weight:bold;background-color:#f36103;color:white">Add to Cart</a></h3>
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