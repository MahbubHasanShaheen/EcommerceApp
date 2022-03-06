
<div class="row">
  <div class="col-md-2">
    <a href="<?php appsConfig::URL('admin.php?admin=createCategory')?>"><button class="btn btn-success" style="margin-top: 20px">Create Data</button></a>
  </div>

  <div class="col-md-10">
    <h1 style="text-align: center;">Category Page</h1>
  </div>
</div>

<hr>


<script type="text/javascript">
  $(document).ready(function(){
    $('#city').DataTable();
});
</script>

<div class="row">
<div class="col-md-10">
<table id="city" class="display">
  <thead>
    <tr style="background-color: #ECEEE4; border-top:2px solid black;">
      <th>Sl</th>
      <th>Category Name</th>
      <th>Action</th>
    </tr>
  </thead>


  <tbody>


    <?php
    $c = new DBContext();

    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $command ="delete from category where id = ".$id;
      $c->deleteData($command);
    }





    $i=1;
    $sql = "select * from category";
    foreach ($c->getData($sql) as  $value) {
      echo '    <tr>
      <td>'.$i++.'</td>

      <td>'.$value['name'].'</td>
      
      <td>
      <a href="'.appsConfig::Link('admin.php?admin=editCategory&edit='.$value['id']).'"><button class="btn btn-primary">Edit</button></a>





      <a href="'.appsConfig::Link('admin.php?admin=category&delete='.$value['id']).'"><button class="btn btn-danger">Delete</button></a>

      </td>
    </tr>';
    }




    ?>



    
  </tbody>



</table>
</div>
</div>








