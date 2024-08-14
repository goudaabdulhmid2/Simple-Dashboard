<?php
 require '../../config/admins.php';
 session_start();
 session_regenerate_id();
 $admin = new Admins();
 if(isset($_SESSION['admin_id']) && $admin->checkLevel($_SESSION['admin_id']) ){
  
    if(isset($_POST['delete'])){
    $admin->deleteUser($_POST['delete_id']);
    header('location:index.php');
    exit;

   }
   $row= $admin->getUser($_GET['id']);
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
    </tr>
  </thead>
  <tbody>
   
    <tr>
    <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['superAdmain'];?></td>
      <td><?php echo $row['created_at'];?></td>
      <td><?php echo $row['update_at'];?></td>
    </tr>
  </tbody>
</table>
<?php if($row['id']!== $_SESSION['admin_id']):?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"  style="float: right;" method="POST" >
      <input type="hidden" name= "delete_id" value ="<?php echo'id= '.$row['id'];?>">
      <input type="submit" name="delete" value="Delete" class="btn btn-danger"></form><?php endif;?>
     
      <a style="float: left;" href="<?php echo ROOT_URL;?>admin/adminOpration/infoEdit.php?id=<?php echo $row['id']; $_SESSION['id_n']=$row['id']; ?>" class="btn btn-light">Edit</a>
</div>


















<?php include '../../inc/footer.php';?>