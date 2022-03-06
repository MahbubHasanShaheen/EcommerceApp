

 <div class="row">
 <div class="col-md-10"  style="margin: 10px; width: 100%; margin: 0px auto">
 <div class="countryhead">
<script>
   $(document).ready(function(){
    $('#city').DataTable();
});
</script>

<div class="row">
<div class="col-md-2">
<a href="<?php appsConfig::URL('admin.php?admin=createCity')?>"><button class="btn btn-success" style="margin-top: 20px">Create Data</button></a>
</div>
<div class="col-md-8">
  <h1 style="text-align: center;">City Page</h1>
</div>
</div>
<hr>
</div>




 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
  <table class="display" id="city">
  	<thead>
  		<tr style="background-color:#ECEEE4">
  			<th>SL</th>
  			<th>City Name</th>
        <th>Country Name</th>
  			<th>Action</th>
  		</tr>

  	</thead>

    <tbody>
    

    	<?php

  $c= new DBcontext();

  if (isset($_GET['delete'])) {
  $id= $_GET['delete'];
  $command="delete from city where id=".$id;
  $c->deleteData($command);
 }


  $i=1;
  $sql= "select city.*,country.name as cname from city inner join country on city.countryid = country.id";

 
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
        <td>'.$value["name"].'</td>
        <td>'.$value['cname'].'</td>
        <td>
          <a href="'.appsConfig::Link('admin.php?admin=editCity&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>


          <a href="'.appsConfig::Link('admin.php?admin=city&delete='.$value['id']).'"><button class="btn btn-danger" >Delete</button></a>
        </td>
      </tr>';
  }







      ?>


    </tbody>

  </table>
  </div>
  </div>
  </div>
  </div>


  
