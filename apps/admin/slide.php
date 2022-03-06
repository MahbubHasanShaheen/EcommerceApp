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
  <h1>Slide Page</h1>
  <hr>
  <a href="<?php appsConfig::URL('admin.php?admin=createSlide')?>"><button class="btn btn-default">Create Data</button></a>
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
        <th>Images Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>

    </thead>

    <tbody>
    

      <?php

  $c= new DBcontext();

 if(isset($_GET['delete'])){
        $id = $_GET['delete'];
      $imgname = base64_decode($_GET['imgname']);
      $path = 'apps/photo/';
      $imageName = $id.'_'.$imgname;

      $command ="delete from slide where id = ".$id;
      $c->deleteData($command);

      if(unlink($path.$imageName)){
        echo'<h3 style="background-color:green; padding:10px; width:400px; color:gold">image delete successfully</h3>';
      }
      else{
       

        echo'<h3 style="background-color:green; padding:10px; width:400px; color:gold">image delete Faield</h3>';
      }
      
    }


  $i=1;
  

 $sql= "select * from slide";
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
      <td>'.$value['name'].'</td>
      
      <td><img src="apps/photo/'.$value['id'].'_'.$value['name'].'" width="100" height="50"/></td>
      <td>
      <a href="'.appsConfig::Link('admin.php?admin=editSlide&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>




      <a href="'.appsConfig::Link('admin.php?admin=slide&delete='.$value['id']).'&imgname='.base64_encode($value['name']).'"><button class="btn btn-danger">Delete</button></a>

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