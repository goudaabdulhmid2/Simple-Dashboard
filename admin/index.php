<?php
 require '../config/count.php';
 session_start();
 session_regenerate_id();
$counts = new Counts();
 if(isset($_SESSION['admin_id'])){
  $cities = $counts->getCitiesCount();
  $orders = $counts->getOrdersCount();
  $admins = $counts->getAdminsCount();
  $services = $counts->getServicesCount();

 }
 else{
    header('location:login.php');
    exit;
    
 }


?>



<?php include '../inc/header.php';?>




<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Cities</h5>
                    <p class="card-text">Number of cities: <b><?php echo $cities;?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Services</h5>
                    <p class="card-text">Number of Services: <b><?php echo $services ;?></b></p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">Number of Orders: <b><?php echo $orders;?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">Number of Admins: <b><?php echo $admins;?></b></p>
                </div>
            </div>
        </div>
    </div>
</div>













<?php include '../inc/footer.php';?>

