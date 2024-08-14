<?php
 require '../../config/services.php';
 session_start();
 session_regenerate_id();
 $services = new Services();
 $massage;
 if(isset($_SESSION['admin_id'])){
   if(isset($_POST['submit']))
   {
     if(!(isset($_POST['service']) &&filter_var(trim($_POST['service']), FILTER_SANITIZE_STRING) &&!$services->serviceFind(trim($_POST['service']))) ){
        $massage='Service Name Not Valid.';
     }
     if(!isset($massage)){
        $service = htmlentities($_POST['service']);
        $data = [
            'service'=>$service
        ];

       if( $services->addService($data)){
        header('location:index.php');
        exit;
       }

     }
   }
 }
 else{
    header('location:login.php');
    exit;
    
 }


?>


<?php include '../../inc/header.php';?>


<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
  <div class="form-group">
    <label for="serviceName">Service Name:</label>
    <input type="text" name="service" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Service">
  </div>
  <br>
  
  <input class="btn btn-primary" type="submit" name="submit" value="Enter">
  <?php if(isset($massage)): echo ' <span class="error" style="color: red">'.$massage.' </span>';endif; ?>
</form>
</div>









<?php include '../../inc/footer.php';?>