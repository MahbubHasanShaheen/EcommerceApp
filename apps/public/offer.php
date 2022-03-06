  


<div class="container">
  <div class="row" style="min-height: 900px">

  
  <h3 style="text-align: center; padding: 10px; padding: 25px; margin: 15px">Coming Soon Product.......</h3>
 <?php
$db = new DBContext();

$sql = "select * from product where pcode='333' ";

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
    

           <div class="price">
    <div class="price-box">
   <div class="row">
    
    <div class="col-md-4">
    <p style="background-color:gray; width:75px; line-height:12px; color:gold">$'.$value['price'].'</p>
     </div>



    
  

    <div class="col-md-8">
    <h4>'.$value['name'].' <a href="'.appsConfig::Link('details/'.$value['id']).'"></a></h4>
    </div>
</div>
    </div>
  

     
   
    </div>
    </div>
   </div></a>';



}



?>
   </div>
   </div>
   