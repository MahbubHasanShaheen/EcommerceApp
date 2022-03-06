<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="apps/css/bootstrap.css">
</head>
<body>

 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
 <div class="countryhead">
  <h1>Country Page</h1>
  <hr>
  <a href="<?php appsConfig::URL('admin.php?admin=createCountry')?>"><button class="btn btn-default">Create Data</button></a>
  <hr>
</div>
  </div>
 </div>



 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
  <table>
  	<thead>
  		<tr>
  			<th>SL</th>
  			<th>Name</th>
  			<th>Action</th>
  		</tr>

  	</thead>

    <tbody>
    

    	<?php

  $c= new DBcontext();

  if (isset($_GET['delete'])) {
  $id= $_GET['delete'];
  $command="delete from subscribe where id=".$id;
  $c->deleteData($command);
 }


  $i=1;
  $sql="select* from subscribe";
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
        <td>'.$value["emails"].'</td>
        <td>
          


          <a href="'.appsConfig::Link('admin.php?admin=email&delete='.$value['id']).'"><button class="btn btn-danger" >Delete</button></a>
        </td>
      </tr>';
  }







      ?>


    </tbody>

  </table>
  </div>
  </div>

  

</body>
</html>