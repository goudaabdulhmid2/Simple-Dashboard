<?php
require '../../config/services.php';
session_start();
session_regenerate_id();
$services = new Services();

if(isset($_SESSION['admin_id'])){

    $rows = $services->getServices();

}else{
    header('location:login.php');
    exit;
}

?>


<?php include '../../inc/header.php';?>



<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Service</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updata_at</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($rows as $row):?>
   
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['service'];?></td>
      <td><?php echo $row['created_at'];?></td>
      <td><?php echo $row['update_at'];?></td>
      <td><a class="btn btn-light" href="<?PHP echo ROOT_URL.'admin/services/update.php?id='.$row['id'];?>">More</a></td>
       
    </tr>
    <?php endforeach;?> 
  </tbody>
</table>
</div>







<?php include '../../inc/footer.php';?>