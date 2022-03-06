<div class="row">
<div class="job">
  <div class="container">



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
<div class="row">
<h1 style="text-align: center;">Online Application sarichuri.com</h1>
<hr>
<div class="col-md-8" style="width: 100%; margin: 0px auto">

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



<form action="" method="post">
   <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  </div>
   <div class="col-md-4">
   <div class="form-group">
    <label for="exampleInputEmail1">Father Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  </div>

    <div class="col-md-4">
   <div class="form-group">
    <label for="exampleInputEmail1">Mother Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  </div>



  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  </div>
   <div class="col-md-4">
   <div class="form-group">
    <label for="exampleInputEmail1">Contact Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  </div>

    <div class="col-md-4">
   <div class="form-group">
    <label for="exampleInputEmail1">National ID No</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  </div>



   <div class="col-md-12">
    <div class="form-group">
    <label for="exampleInputEmail1">Present Address</label>
    <textarea class="form-control"  name="address">
    </textarea>
  </div>
  </div>
     <div class="col-md-12">
      <div class="form-group">
    <label for="exampleInputEmail1">Permanant Address</label>
    <textarea class="form-control"  name="address">
    </textarea>
  </div>



     <div class="form-group">
    <label for="exampleInputEmail1">Gender</label>
    <input type="radio" name="gender" value="male">Male
     <input type="radio" name="gender" value="female">Female
    </div>


        <div class="form-group">
    <label for="exampleInputEmail1">Education</label>
    <input type="checkbox" name="gender" value="male">Male
     <input type="checkbox" name="gender" value="female">Female
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

    <div class="form-group">
    <label>City</label>
    <select class="form-control" id="CityResult" name="cityid">
      

    </select>
  </div>



  <button class="btn btn-primary" name="btn">Submit</button>

</form>
</div>
</div>
</div>
<hr>
  	
  </div>
	
</div>
	
</div>