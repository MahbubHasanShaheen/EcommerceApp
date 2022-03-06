


<!--start porduct area-->
<div class="images-area">
<div class="container">
<h2 style="text-align: center; color: black;font-size: 30px; padding: 40px; font-weight: bold; text-shadow: 3px 0px 3px gray;">Photo Gallary</h2>


  <div class="row">

  <?php
$db = new DBContext();

$sql = "select * from gallary";



foreach ($db->getData($sql) as $item) {
    $imgName = $item['name'];
    $imgId = $item['id'];



 if($imgName != ""){
        echo '<div class="col-md-3">
    <div class="images-box">
    
    <figure>

      
        <img style="height:150px; width:250px;border:2px solid silver" src="'.appsConfig::Link('apps/photo/'.$imgId.'_'.$imgName).'" ';

      }else{
        echo '<img src="'.appsConfig::Link('apps/photo/download.jpg').'"';


      }




    echo '</figure>
    

  
</div>

   

    </div>';



}



?>

</div>
</div>
</div>



<!--end porduct area-->
