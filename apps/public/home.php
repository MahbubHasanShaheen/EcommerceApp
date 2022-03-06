

<?php include_once 'apps/public/slider.php';?>

<!--start porduct area-->

<div class="product-area">
 <div class="container-fluid">
  <div class="row"  style="padding-left: 50px;">

 <?php
$db = new DBContext();

$sql = "select * from product where pcode between 0 and 1000";
//$sql = "select * from product";
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
    <div class="product-box" style="height:280px;width:200;margin:20px auto;padding:6px">
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



<?php include_once 'apps/public/speciality.php';?>




















   










