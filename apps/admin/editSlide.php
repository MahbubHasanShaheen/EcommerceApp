


<h1>Udate Gallary</h1>
<hr>
<script type="text/javascript">
  function hideMGS() {
    f = document.getElementById("success");
    f.style.display = "none";
  }

</script>




<div class="row">
<div class="col-md-8">

<?php

  if(!isset($_GET['edit'])) {
    die();
    
   }
   
   $id = $_GET['edit'];


$c = new DBcontext();
if($_SERVER['REQUEST_METHOD'] == "POST"){


$file = $_FILES['file']['name'];
echo $size = $_FILES['file']['size'];


if($file != ""){
echo $sql = "update slide set name = '".$file."'  where id = ".$id; 
}



 if($c->editData($sql)){
  echo '<div class="success" id="success">Data Edit Successfully <span style="float:right">

  <a href="javascript:void(0)" onclick="hideMGS()"><i class="fa fa-times" aria-hidden="true"></i></a>

  </span></div>';

if($file != ""){
  $sp = $_FILES['file']['tmp_name'];
  $dp = "apps/photo/".$id.'_'.$file;
  move_uploaded_file($sp, $dp);


}

  

 }else{
  echo '<div class="error">Data Saved fail</div>';
 }



}

?>








<form action="" method="post" enctype="multipart/form-data">





  <div class="form-group">
    <label for="exampleInputEmail1">GallaryImage</label>
    <input type="file" class="form-control" id="exampleInputEmail1"  name="file">
  </div>





 <button type="submit" class="btn btn-primary" name="btn">Submit</button>

  </form>



</div>

</div>

<hr>
<a href="<?php appsConfig::URL('admin.php?admin=slide')?>">Back to List</a>

