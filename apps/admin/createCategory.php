


<h1 style="text-align: center;">Create Category </h1>
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
$c = new DBContext();
if($_SERVER['REQUEST_METHOD'] == "POST"){




$name = $_POST['name'];




$sql = "insert into category(name) values('".$name."')";





 if($c->addData($sql)){
  echo '<div class="success" id="success">Data Saved Successfully <span style="float:right">

  <a href="javascript:void(0)" onclick="hideMGS()"><i class="fa fa-times" aria-hidden="true"></i></a>

  </span></div>';
 }else{
  echo '<div class="error">Data Saved fail</div>';
 }



}

?>








<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
    
  </div>


 

 <button type="submit" class="btn btn-primary" name="btn">Submit</button>

  </form>



</div>

</div>

<hr>
<a href="<?php appsConfig::URL('admin.php?admin=category')?>">Back to List</a>

