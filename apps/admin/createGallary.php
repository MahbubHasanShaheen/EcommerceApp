


<h1>Create Gallary</h1>
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
$c = new DBcontext();
if($_SERVER['REQUEST_METHOD'] == "POST"){


$file = $_FILES['file'] ['name'];;

echo $size = $_FILES['file']['size'];

echo $sql = "insert into gallary (name) values('".$file."')";


//if ($size<=2000) {

  if($c->addData($sql)){
  echo '<div class="success" id="success">Data Saved Successfully <span style="float:right">

  <a href="javascript:void(0)" onclick="hideMGS()"><i class="fa fa-times" aria-hidden="true"></i></a>

  </span></div>';
 $sp = $_FILES['file']['tmp_name'];
 $dp = "apps/photo/".$c->lastid.'_'.$file;
  move_uploaded_file($sp, $dp);

 }else{
  echo '<div class="error">Data Saved fail</div>';
 }
 
}//else{
  //echo '<div class="error">Image size unexcepted</div>';

//}

 



//}
?>








<form action="" method="post" enctype="multipart/form-data">




  <div class="form-group">
    <label for="exampleInputEmail1">Gallary Image</label>
    <h5>Height imaze size 2024 bytes</h5>
    <input type="file" class="form-control" id="exampleInputEmail1"  name="file">
  </div>





 <button type="submit" class="btn btn-primary" name="btn">Submit</button>

  </form>



</div>

</div>

<hr>
<a href="<?php appsConfig::URL('admin.php?admin=gallary')?>">Back to List</a>

