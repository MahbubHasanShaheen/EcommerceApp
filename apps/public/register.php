<script type="text/javascript">
  function ajax(str) {

    if(window.XMLHttpRequest)
    {
      xmlhttp = new XMLHttpRequest();
    }
    else
    {
      xmlhttp = new ActiveObject(Microsoft.XMLHTTP);
    }



    
    xmlhttp.onreadystatechange = function()
    {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
      {
        
        document.getElementById("CityResult").innerHTML = xmlhttp.responseText;
      }
    
    }
    
    xmlhttp.open("GET","ajax.php?q="+str,true);
    xmlhttp.send();

  }
</script>


<div class="container">
<div class="row" style="margin-top:10px">


<div class="col-md-12">

<?php
$db = new DBContext();
if(isset($_POST['btn'])){
$name = $_POST['name'];
$password = md5($_POST['password']);
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$cityid = $_POST['cityid'];
$countryid = $_POST['countryid'];

echo $sql = "insert into user1(name,email,password,contact,address,gender,countryid,cityid,status) values ('".$name."','".$email."','".$password."','".$contact."','".$address."','".$gender."',".$countryid.",".$cityid.", 'U' )";


if($db->addData($sql)){
echo '<div class="success">Registration successfully...</div>';
}
else{
  echo '<div class="error">Registration Fail...</div>';
}



}




?>


<div class="registration"  style="width:60%; margin: 0 auto; border:1px solid gray; padding:20px">
  <div class="card" style="">
    <div class="card-header">
      <h3 style="text-align:center;">Sign Up sarichuri.com</h3>
    </div>
 <div class="card-body">
<form action="" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
  </div>


   <div class="form-group">
    <label for="exampleInputEmail1">Contact</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="contact">
  </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <textarea class="form-control"  name="address">
    </textarea>
  </div>


    <div class="form-group">
    <label>City</label>
    <select class="form-control" id="CityResult" name="cityid">
      
          <option>Select</option>
    <?php
    $sql = "select * from city";
    $db = new DBContext();
    foreach ($db->getData($sql) as $key => $value) {
      echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }


    ?>
    </select>
  </div>


  <div class="form-group">
    <label for="exampleSelect1">Country</label>
    <select class="form-control" id="exampleSelect1" name="countryid" onchange="ajax(this.value)">
    <option>Select</option>
    <?php
    $sql = "select * from country";
    $db = new DBContext();
    foreach ($db->getData($sql) as $key => $value) {
      echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
    }


    ?>

    </select>
  </div>

  <button class="btn btn-primary" name="btn" style="width:100%;margin: 0 auto;">Submit</button>

</form>
</div>
</div>
</div>
</div>
</div>
</div>

<hr>