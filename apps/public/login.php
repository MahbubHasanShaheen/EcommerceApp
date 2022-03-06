
<div class="log" style="width: 450px; padding-top: 25px;  margin: 40px auto;">
   <div class="container">
<div class="row" style="min-height:450px">
<?php
$db = new DBContext();
if(isset($_POST['btn'])){
$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "select * from user1 where email = '".$email."' and password = '".$password."'";

if($db->getData($sql)){
foreach ($db->getData($sql) as  $value) {
  $_SESSION['name'] = $value['name'];
  $_SESSION['id'] = $value['id'];
  $_SESSION['status'] = $value['status'];
  if($_SESSION['status'] == 'U'){
    header("Location:".appsConfig::Link('welcome'));
  }else{
    header("Location:".appsConfig::Link('admin.php'));
  }


}


}
else{
echo '<div class="error">username and password does not match</div>';
}



}

?>


      <div class="row"  style="width: 100%; margin:0px auto">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap py-5"  style="background-color:#080232;padding: 30px; color:white">
            
            <h3 class="text-center mb-0">Welcome</h3>
            <p class="text-center">Sign in by entering the information below</p>
            <form action="" class="login-form" method="post">
              <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="form-group d-md-flex">
                <div class="w-100 text-md-right">
                  <!--<a href="#">Forgot Password</a>-->
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="btn" class="btn form-control btn-primary rounded submit px-3">Login</button>
              </div>
            </form>
            <div class="w-100 text-center mt-4 text">
              <p class="mb-0">Don't have an account? Please</p><br>
              <a style="color:deepskyblue;" href="<?php appsConfig::URL('register')?>">Sign Up</a>
            </div>
          </div>
        </div>
    
</div>
</div>
</div>
</div>
<hr>