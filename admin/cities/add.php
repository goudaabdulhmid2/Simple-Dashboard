<?php
 require '../../config/cities.php';
 session_start();
 session_regenerate_id();
 $cities = new Cities();
 $massage;
 if(isset($_SESSION['admin_id'])){
   if(isset($_POST['submit']))
   {
     if(!(isset($_POST['city']) &&filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING) &&!$cities->cityFind(trim($_POST['city']))) ){
        $massage='City Name Not Valid.';
     }
     if(!isset($massage)){
        $city = htmlentities($_POST['city']);
        $data = [
            'city'=>$city
        ];

       if( $cities->addCity($data)){
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
    <label for="CityName">City Name:</label>
    <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City">
  </div>
  <br>
  
  <input class="btn btn-primary" type="submit" name="submit" value="Enter">
  <?php if(isset($massage)): echo ' <span class="error" style="color: red">'.$massage.' </span>';endif; ?>
</form>
</div>









<?php include '../../inc/footer.php';?>