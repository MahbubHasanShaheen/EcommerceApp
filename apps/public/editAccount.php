
<div class="row" style="margin-top: 30px">
<div class="container">

<?php
$tell = "";
$contact = "";
$newcontact = "";
$confirmcontact = "";
$db = new DBContext();
if(isset($_POST['btn'])){
$tell = $_POST['contact'];
$contact = $_POST['contact'];
$newcontact = $_POST['newcontact'];
$confirmcontact = $_POST['confirmcontact'];

$sql = " select * from user1 where contact = '".$contact."' and id =".$_SESSION['id'];

if($db->getData($sql)){
  if($newcontact == $confirmcontact){
    $Command = "update user1 set contact= '".$confirmcontact."' where id =".$_SESSION['id'];

    if($db->editData($Command)){
      header("Location:".appsConfig::Link('welcome'));
    }



  }
  else{
    echo '<h3 style="color:red">Your confirm contact does not match</h3>';
  }


}else{
  echo '<h3 style=" color:red">Your old contact is not valid</h3>';
}




}


?>



<form action="" method="post">
<label>Old Contact</label><br/>
<input  class= "form-control" type="text" name="contact" value="<?php echo $contact;?>"><br/><br/>

<label>New Contact</label><br/>
<input  class= "form-control" type="text" name="newcontact" value="<?php echo $newcontact;?>"><br/><br/>


<label>Confirm Contact</label><br/>
<input  class= "form-control" type="text" name="confirmcontact" value="<?php echo $confirmcontact;?>"><br/><br/>

<button class="btn btn-primary" type="submit" name="btn">Change Contact</button>

</form>

</div>
<hr>
</div>