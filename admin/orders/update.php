<?php
 require '../../config/orders.php';
 session_start();
 session_regenerate_id();
 $orders = new Orders();
 if(isset($_SESSION['admin_id'])){
   if(isset($_POST['delete'])){
    $orders->deleteOrder($_POST['delete_id']);
    header('location:index.php');
    exit;

   }
   $row= $orders->getOrder($_GET['id']);
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
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Service_id</th>
      <th scope="col">City_id</th>
      <th scope="col">Massage</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updata_at</th>

    </tr>
  </thead>
  <tbody>
   
    <tr>
    <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['fname'];?></td>
      <td><?php echo $row['lname'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php echo $row['service_id'];?></td>
      <td><?php echo $row['city_id'];?></td>
      <td><?php echo $row['massage'];?></td>
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