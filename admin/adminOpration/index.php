<?php
require '../../config/admins.php';
session_start();
session_regenerate_id();
$admin = new Admins();
if(isset($_SESSION['admin_id']))
{
    $level = $admin->checkLevel($_SESSION['admin_id']);
    $rows = $admin->getUsers();
}else{
  header('location:../login.php');
    exit;
}
?>



<?php include '../../inc/header.php';?>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Super Admin</th> 
      <th scope="col">Created_at</th>
      <th scope="col">Updata_at</th>
      <?php if($level):?>
        <th scope="col">Edit</th> 
        <?php endif;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($rows as $row):?>
   
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['superAdmain'];?></td>
      <td><?php echo $row['created_at'];?></td>
      <td><?php echo $row['update_at'];?></td>
      <?php if($level):?>
        <td><a class="btn btn-light" href="<?PHP echo ROOT_URL.'admin/adminOpration/update.php?id='.$row['id'];?>">More</a></td>
      <?php endif;?>
      
       
    </tr>
    <?php endforeach;?> 
  </tbody>
</table>
</div>


<?php include '../../inc/footer.php';?>
