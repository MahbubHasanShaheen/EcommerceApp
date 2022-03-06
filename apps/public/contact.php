


<div class="container" style="min-height: 450px;"><br><br><br><br>
	<div class="row" style="padding:30px">
	




	 <div class="col-md-10">
	 <div class="arb">
	   <h4>Head office: 10/3 Mirpur - 12, Dhaka-1209</h4>
	   <h4> Mail Address :shaheen@gmail.com</h4>
	   <h4>Webmail Address : mail@sarichuri.com</h4>
	   <h4>Contact No : +0801760002135, +8801866311326</h4>
	   
	 	</div>
	 </div>

	</div>






	 <div class="row" style="padding:30px">

     <?php
      if (isset($_POST['submit'])) {
      	$usermail = $_POST['email'];
      	$usermsg = $_POST['message'];

    $to = 'company@gmail.com';
    $subject = "Contact page message";
    $message = 'user email address'.$usermail.' and your message'.$usermsg;

    $email ="domainEmail@abc.com";
    $header ="From:$email";
    if(mail($to,$subject,$message,$header))
    {
    	echo 'message send successfully';
    }
    else{
    	echo 'message send fail....';
    }
      	
      }







     ?>



	 

	 <form action="" method="post">

	   Email Address:<input type="email" name="email" class="form-control"><br>
	   Details :<textarea type="text" class="form-control"></textarea><br><br>

	   <button class="btn btn-success" name="submit" value="submit">Send Mail</button><br>
	 	
	 </form>
	 	
	 </div>
		
	</div>
	
</div>








