<!DOCTYPE html>
<html>
<head>
	<title></title>

  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/reset.css')?>" > 
    <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/jquery-picZoomer.css')?>"> 
    <style type="text/css">


    .piclist{
        margin-top: 30px;
    }
    .piclist li{
        display: inline-block;
        width: 50px;
        height: 50px;
    }
    .piclist li img{
        width: 100%;
        height: auto;
    }

    /* custom style */
    .picZoomer-pic-wp,
    .picZoomer-zoom-wp{
      
        z-index: 0;
    }


    </style>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php appsConfig::URL('apps/js/jquery.picZoomer.js')?>"> </script>
    <script type="text/javascript">
        $(function() {
            $('.picZoomer').picZoomer();

            $('.piclist li').on('click',function(event){
                var $pic = $(this).find('img');
                $('.picZoomer-pic').attr('src',$pic.attr('src'));
            });
        });
    </script>
</head>
<body>


<div class="jquery-script-ads">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 700;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>


<?php
if(!isset($url[1])){
die();
}

$id = $url[1];

$db = new DBContext();
$imgName = "";
$imgId = 0;
//$sql = "select * from product where id = ".$id;





 $sql= "select product.*,category.name as ctname from product left join category on product.categoryid = category.id where product.id=".$id;

if($db->getData($sql)){

foreach ($db->getData($sql) as $key => $value) {

$command = "select * from images where pid = ".$value['id']." limit 0,1";
foreach ($db->getData($command) as $item) {
	$imgName = $item['name'];
	$imgId = $item['id'];
}



?>




<div class="container details">
<div class="row">

<div class="col-md-3">
<div class="productimage-details" style="margin-top:20px">
<div class="picZoomer">
		       <?php
		            

		 echo ' <img src="'.appsConfig::Link('/apps/productImage/'.$item['id'].'_'.$item['name']).'" alt="'.$value['name'].'" height="300" width="300"> ';

		                

		        
	  ?>

 </div>
</div>		
</div>
			
<div class="col-md-4">
				
</div>


<div class="col-md-5">
	<table  style="font-size:13px;margin-top: -65px;">
		<tr>
			<td width="35%">Product name</td>
			<td width="6%">:</td>
			<td width="85%"><?php echo $value['name']?></td>
		</tr>


		<tr>
			<td>Product Code</td>
			<td>:</td>
			<td><?php echo $value['pcode']?></td>
		</tr>

		<tr>
			<td>Product Price</td>
			<td>:</td>
			<td><?php echo $value['price']?>.00 Taka </td>
		</tr>




		<tr>
			<td>Product Discount</td>
			<td>:</td>
			<td><?php echo $value['discount']?> %</td>
		</tr>

    
	   <tr>
			<td>Total price</td>
			<td>:</td>
			<td><?php echo(($value['price']-(($value['price'] * $value['discount'])/100)))?>.00 Taka </td>
		</tr>


		<tr>
			<td>Product Category</td>
			<td>:</td>
			<td><?php echo $value['ctname'];?></td>
		</tr>

		<tr>
			<td>Product Description</td>
			<td>:</td>
			<td><?php echo $value['description'];?></td>
		</tr>

		<tr>
			<td colspan="5">
			<form action="<?php appsConfig::URL('details/'.$value['id'])?>" method="post">
				<input  type="number" name="qty" value="1" style="width:70px" >
			<button class="btn btn-primary" name="btn_cart" type="submit">Add to Cart</button>
			
		    
	    <a  style="background-color: orangered; font-weight:bold;color: aqua; margin-left:30px;width: 200px; text-align:center" class="btn" href="<?php appsConfig::URL('home')?>">CONTINUE SHOPING</a>


			</form>
			
			</td>
		</tr> 
	</table>

</div>

</div>


<?php 


if(isset($_POST['btn_cart'])){
	$qty = $_POST['qty'];
	$pname = $value['name'];
	$pprice = $value['price'];
	
	$psid = session_id();
	$pid = $value['id'];
	$pdiscount = $value['discount'];
	$scommand = "insert into cart(pid,sid,name,price,discount,qty) values(".$pid.",'".$psid."','".$pname."',".$pprice.",".$pdiscount.",".$qty.")";
	$db->addData($scommand);
	header("Location:".appsConfig::Link('details/'.$pid));
}




} //end foreach loop

	}
	else
	{
	 	print_r($db->Error);

	} ?>









<div class="row" style="margin-top: 50px;">
<?php
$command = "select * from images where pid = ".$value['id'];
foreach ($db->getData($command) as $item) {
	echo '
	<div class="col-md-2">
	<div class="all-image">
	<img style="width:120px; height:110px; margin:0 auto" id="zoom-01" src="'.appsConfig::Link('apps/productImage/'.$item['id'].'_'.$item['name']).'" >
	
	</div>
	</div>';
}

?>

</div>
</div>
</div>
<hr>



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



</body>
</html>



















