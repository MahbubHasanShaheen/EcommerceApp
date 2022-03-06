<script>
   $(document).ready(function(){
    $('#img').DataTable();
});
</script>
    <div class="row">
 <div class="col-md-2">
    <a href="<?php appsConfig::URL('admin.php?admin=createImages')?>"><button class="btn btn-success" style="margin-top: 20px">Create Data</button></a>
 </div>
 <div class="col-md-10">
   <h1 style="text-align: center;">Image Page</h1>
 </div>
 </div>
 <hr>



<div class="row" style="margin: 10px;">
 <div class="col-md-10">
  <table id="img" class="display">
  	<thead>
  		<tr style="background-color: #29b8c2; border-top:2px solid black;">
  			<th>SL</th>
  			<th>Product Name</th>
        
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
      $path = 'apps/productImage/';
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
  

 $sql= "select images.*,product.name as pname from images inner join product on images.pid = product.id";
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
      <td>'.$value['pname'].'</td>
      
      <td><img src="apps/productImage/'.$value['id'].'_'.$value['name'].'" width="100" height="50"/></td>
      <td>
      <a href="'.appsConfig::Link('admin.php?admin=editImages&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>




      <a href="'.appsConfig::Link('admin.php?admin=images&delete='.$value['id']).'&imgname='.base64_encode($value['name']).'"><button class="btn btn-danger">Delete</button></a>

      </td>
      </tr>';
  }







      ?>


    </tbody>

  </table>
  </div>
  </div>
<hr>
