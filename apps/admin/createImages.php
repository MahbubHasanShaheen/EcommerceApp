


<h1>Create Image</h1>
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

$pid = $_POST['pid'];
$file = $_FILES['file']['name'];



$sql = "insert into images(name,pid) values('".$file."',".$pid.")";


//if ($size<=2000) {

  if($c->addData($sql)){
  echo '<div class="success" id="success"><span style="background-color:green; padding:6px; width:650px; margin-top:20px; color:gold">Data Saved Successfully

  <a href="javascript:void(0)" onclick="hideMGS()"><i class="fa fa-times" aria-hidden="true"></i></a>

  </span></div><br>';
  $sp = $_FILES['file']['tmp_name'];
  $dp = "apps/productImage/".$c->lastid.'_'.$file;
  move_uploaded_file($sp, $dp);




 }else{
  echo '<div class="error">Data Saved fail</div><br>';
 }
  
 echo  $size = $_FILES['file']['size'].  '  kbs';
}//else{
  //echo '<div class="error">Image size unexcepted</div>';

//}

 



//}
?>








<form action="" method="post" enctype="multipart/form-data">



  <div class="form-group" style="margin-top:10px">
    <label for="exampleInputEmail1">Product name</label>
    <select name="pid" class="form-control">
      <option value="0">Select</option>
      <?php
      $db = new DBContext();
      $sql = "select * from product";
      foreach ($db->getData($sql) as  $value) {
        echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
      }

      ?>

    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Small Image</label>
    <h5>Height imaze size 2024 bytes</h5>
    <input type="file" class="form-control" id="exampleInputEmail1"  name="file">
  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Product Big Image</label>
    <h5>Height imaze size 2024 bytes</h5>
    <input type="file" class="form-control" id="exampleInputEmail1"  name="file">
  </div>





 <button type="submit" class="btn btn-primary" name="btn">Submit</button>

  </form>



</div>

</div>

<hr>
<a href="<?php appsConfig::URL('admin.php?admin=images')?>">Back to List</a>

