
<div class="row" style="margin-top: 30px">
<div class="container">

<?php
$pass = "";
$password = "";
$newpassword = "";
$confirmpassword = "";
$db = new DBContext();
if(isset($_POST['btn'])){
$pass = $_POST['password'];
$password = md5($_POST['password']);
$newpassword = $_POST['newpassword'];
$confirmpassword = $_POST['confirmpassword'];

$sql = " select * from user1 where password = '".$password."' and id =".$_SESSION['id'];

if($db->getData($sql)){
	if($newpassword == $confirmpassword){
		$Command = "update user1 set password = '".md5($confirmpassword)."' where id =".$_SESSION['id'];

		if($db->editData($Command)){
			header("Location:".appsConfig::Link('welcome'));
		}



	}
	else{
		echo '<h3 style="color:red">Your confirm password does not match</h3>';
	}


}else{
	echo '<h3 style=" color:red">Your old password is not valid</h3>';
}




}


?>



<form action="" method="post">
<label>Old Password</label><br/>
<input  class= "form-control" type="password" name="password" value="<?php echo $pass;?>"><br/><br/>

<label>New Password</label><br/>
<input  class= "form-control" type="password" name="newpassword" value="<?php echo $newpassword;?>"><br/><br/>


<label>Confirm Password</label><br/>
<input  class= "form-control" type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>"><br/><br/>

<button class="btn btn-primary" type="submit" name="btn">Change Password</button>

</form>

</div>
<hr>
</div>