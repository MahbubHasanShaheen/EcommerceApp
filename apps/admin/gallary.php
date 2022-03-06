<script>
   $(document).ready(function(){
    $('#gallery').DataTable();
});
</script>



 <div class="countryhead">
    <div class="row">
 <div class="col-md-2">
    <a href="<?php appsConfig::URL('admin.php?admin=createGallary')?>"><button class="btn btn-success" style="margin-top: 20px">Create Data</button></a>
 </div>
 <div class="col-md-10">
   <h1 style="text-align: center;">Gallary Page</h1>
 </div>
 </div>

<hr>
</div>
  




 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
  <table id="gallery" class="display">
    <thead>
      <tr style="background-color: #29b8c2; border-top:2px solid black;">
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

      $command ="delete from images where id = ".$id;
      $c->deleteData($command);

      if(unlink($path.$imageName)){
        echo'<h3 style="background-color:green; padding:10px; width:400px; color:gold">image delete successfully</h3>';
      }
      else{
       

        echo'<h3 style="background-color:green; padding:10px; width:400px; color:gold">image delete Faield</h3>';
      }
      
    }


  $i=1;
  

 $sql= "select * from gallary";
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
      <td>'.$value['name'].'</td>
      
      <td><img src="apps/photo/'.$value['id'].'_'.$value['name'].'" width="100" height="50"/></td>
      <td>
      <a href="'.appsConfig::Link('admin.php?admin=editGallary&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>




      <a href="'.appsConfig::Link('admin.php?admin=gallary&delete='.$value['id']).'&imgname='.base64_encode($value['name']).'"><button class="btn btn-danger">Delete</button></a>

      </td>
      </tr>';
  }







      ?>


    </tbody>

  </table>
  </div>
  </div>
 

