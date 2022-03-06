<script>
   $(document).ready(function(){
    $('#admin').DataTable();
});
</script>

 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
 <div class="countryhead">
<h2 style="text-align: center;">Admin Info</h2>
  <hr>
</div>
  </div>
 </div>



 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
  <table id="admin" class="display">
  	<thead>
  		<tr style="background-color: #29b8c2; border-top:2px solid black;">
  			<th>SL</th>
  			<th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Action</th>
  		</tr>

  	</thead>

    <tbody>
    

    	<?php

  $c= new DBcontext();

  if (isset($_GET['delete'])) {
  $id= $_GET['delete'];
  $command="delete from user where id=".$id;
  $c->deleteData($command);
 }


  $i=1;
  $sql="select* from user1 where status = 'A'";
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
        <td>'.$value["name"].'</td>
        <td>'.$value["email"].'</td>
        <td>'.$value["password"].'</td>
        <td>'.$value["contact"].'</td>
        
    
        
        <td>
         


          <a href="'.appsConfig::Link('admin.php?admin=user1&delete='.$value['id']).'"><button class="btn btn-danger" >Delete</button></a>
        </td>
      </tr>';
  }







      ?>


    </tbody>

  </table>
  </div>
  </div>

  
