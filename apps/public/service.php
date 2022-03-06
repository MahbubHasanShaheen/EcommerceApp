<h1>Service Page</h1>









 <div class="row">
  <div class="col-md-8";">

  <?php
$db = new DBContext();

$sql = "select * from product";

foreach ($db->getData($sql) as $key => $value) {
$imgName = "";
$imgId = 0;
$command = "select * from images where pid = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
    $imgName = $item['name'];
    $imgId = $item['id'];
}


    
    echo '<a href="'.appsConfig::Link('details/'.$value['id']).'"><div class="col-md-3">
    <div class="product-box">
    <figure>';
      

      if($imgName != ""){
        echo '<img src="'.appsConfig::Link('apps/productImage/'.$imgId.'_'.$imgName).'" alt="'.$value['name'].'" title="'.$value['name'].'">';

      }else{
        echo '<img src="'.appsConfig::Link('apps/productImage/download.jpg').'" alt="'.$value['name'].'" title="'.$value['name'].'">';


      }




    echo '</figure>
    

    <div class="price-box">
    <p>$'.$value['price'].'</p>
    </div>

    <h4>'.$value['name'].' <a href="'.appsConfig::Link('details/'.$value['id']).'" style="background-color:green; padding:10px; color:white; text-align:right">Cart</a></h4>
   
    </div>
    </div></a>';



}



?>






</div>
 
</div>





<div class="col-md-4" style="float: right;">
<div class="discount">
    <?php
$db = new DBContext();

$sql = "select * from product";

foreach ($db->getData($sql) as $key => $value) {
$imgName = "";
$imgId = 0;
$command = "select * from images where pid = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
    $imgName = $item['name'];
    $imgId = $item['id'];
}


    
    echo '<a href="'.appsConfig::Link('details/'.$value['id']).'"><div class="col-md-">
    <div class="product-box">
    <figure>';
      

      if($imgName != ""){
        echo '<img src="'.appsConfig::Link('apps/productImage/'.$imgId.'_'.$imgName).'" alt="'.$value['name'].'" title="'.$value['name'].'">';

      }else{
        echo '<img src="'.appsConfig::Link('apps/productImage/download.jpg').'" alt="'.$value['name'].'" title="'.$value['name'].'">';


      }




    echo '</figure>
    

    <div class="price-box">
    <p>$'.$value['price'].'</p>
    </div>

    <h4>'.$value['name'].' <a href="'.appsConfig::Link('details/'.$value['id']).'" style="background-color:green; padding:10px; color:white; text-align:right">Cart</a></h4>
   
    </div>
    </div></a>';



}



?>

</div>