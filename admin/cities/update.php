<?php
 require '../../config/cities.php';
 session_start();
 session_regenerate_id();
 $cities = new Cities();
 if(isset($_SESSION['admin_id'])){
   if(isset($_POST['delete'])){
    $cities->deleteCity($_POST['delete_id']);
    header('location:index.php');
    exit;

   }
   $row=$cities->getCity($_GET['id']);
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
      <th scope="col">City</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updata_at</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['city'];?></td>
      <td><?php echo $row['created_at'];?></td>
      <td><?php echo $row['update_at'];?></td>  
    </tr>
  </tbody>
</table>
<form action="<?php echo $_SERVER['PHP_SELF'];?>"  style="float: right;" method="POST" >
      <input type="hidden" name= "delete_id" value ="<?php echo'id= '.$row['id'];?>">
      <input type="submit" name="delete" value="Delete" class="btn btn-danger">
</div>


















<?php include '../../inc/footer.php';?>