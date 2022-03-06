<script>
   $(document).ready(function(){
    $('#subcategory').DataTable();
});
</script>

    <div class="row">
 <div class="col-md-2">
     <a href="<?php appsConfig::URL('admin.php?admin=createSubcategory')?>"><button class="btn btn-success" style="margin-top: 20px">Create Data</button></a>
 </div>
 <div class="col-md-10">
   <h1 style="text-align: center;">Subcategory Page</h1>
 </div>
 </div>
 <hr>













 <div class="row" style="margin: 10px;">
 <div class="col-md-10">
  <table id="subcategory" class="display">
    <thead>
      <tr style="background-color: #29b8c2; border-top:2px solid black;">
        <th>SL</th>
        <th>Subcategory Name</th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>

    </thead>

    <tbody>
    

      <?php

  $c= new DBcontext();

  if (isset($_GET['delete'])) {
  $id= $_GET['delete'];
  $command="delete from scategory where id=".$id;
  $c->deleteData($command);
 }


  $i=1;
  $sql= "select scategory.*,category.name as cname from scategory inner join category on scategory.categoryid = category.id";

 
 
  foreach ($c->getData($sql) as $value) {
   
   echo   '<tr>
        <td>'.$i++.'</td>
        <td>'.$value["name"].'</td>
        <td>'.$value['cname'].'</td>
        <td>
          <a href="'.appsConfig::Link('admin.php?admin=editSubcategory&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>


          <a href="'.appsConfig::Link('admin.php?admin=subcategory&delete='.$value['id']).'"><button class="btn btn-danger" >Delete</button></a>
        </td>
      </tr>';
  }







      ?>


    </tbody>

  </table>
  </div>
  </div>

