  


<div class="container">
  <div class="row" style="min-height: 900px">


 <?php
$db = new DBContext();

$sql = "select * from product where pcode='100' ";

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
    <div class="product-box" style="height:310px;margin:50px auto;padding:6px">
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
    <p style="text-align:center;color:black">'.$value['name'].'</p>
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
   