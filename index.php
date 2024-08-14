<?php
 require 'config/orders.php';
 $orders = new Orders();
 $cities_row = $orders->getCities();
 $services_row = $orders->getServices();
 $error_fields=[];
 if(isset($_POST['submit'])){
  if(!(isset($_POST['fname']) && !empty(trim($_POST['fname'])) && filter_var(trim($_POST['fname']), FILTER_SANITIZE_STRING))){
    $error_fields[] = 'fname';
  }
  if(!(isset($_POST['lname']) && !empty(trim($_POST['lname'])) && filter_var(trim($_POST['lname']), FILTER_SANITIZE_STRING))){
    $error_fields[] = 'lname';
  }
  if(!(isset($_POST['email']) && filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) )){
    $error_fields[] = 'email';
  }
  $pattern = '/^\d{11}$/';
  if(!(isset($_POST['phone'])&&filter_var($_POST['phone'], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern))) )){
    $error_fields[] = "phone";
  }
  if(!(isset($_POST['service']))){
    $error_fields[] = 'service';
  }
  if(!(isset($_POST['city']))){
    $error_fields[] = 'city';
  }
  if(!(isset($_POST['massge']))){
    $error_fields[] = 'massge';
  }

  if(!$error_fields){
    $fname = htmlentities(trim($_POST['fname']));
    $lname = htmlentities(trim($_POST['lname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_NUMBER_INT);
    $city = filter_var($_POST['city'],FILTER_VALIDATE_INT);
    $service = filter_var($_POST['service'],FILTER_VALIDATE_INT);
    $massage = htmlentities(trim($_POST['massge']));

    $data =[
        'fname'=> $fname,
        'lname'=> $lname,
        'email'=> $email,
        'phone'=> $phone,
        'service_id'=> $service,
        'city_id'=>$city,
        'massage'=> $massage
    ];

    if($orders->addOrder($data)){
      
      echo '<script>alert("Send Your Order");</script>';
      header('location:index.php');
      exit;
    }

  }



 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}
    </style>
</head>
<body>
<div class="container">
      <div class="text">
         Contact us
      </div>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <!-- Name  -->
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="fname" required>
               <div class="underline"></div>
               <label for="">First Name</label>
               <?php if(in_array('fname', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid name </span>';endif; ?>
            </div>
            <div class="input-data">
               <input type="text" name="lname" required>
               <div class="underline"></div>
               <label for="">Last Name</label>
               <?php if(in_array('lname', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid name </span>';endif; ?>
            </div>
         </div>
        <!-- Email and mobile -->
         <div class="form-row">
            <div class="input-data">
               <input type="email" name="email" required>
               <div class="underline"></div>
               <label for="">Email Address</label>
               <?php if(in_array('email', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid email </span>';endif; ?>
            </div>
            <div class="input-data">
            <input  type="tel" name="phone" required>
               <div class="underline"></div>
               <label for="">Mobile Number</label>
               <?php if(in_array('phone', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid number </span>';endif; ?>
            </div>
         </div>
         <!-- city and service -->
         <div class="form-row">
            <div class="input-data">
            <label for="">Choose Service</label><br>
           
             <select name="service" id="cars">
             <?php foreach($services_row as $service):?>
              <option value="<?php echo $service['id'];?>"><?php echo $service['service'];?></option>
              <?php endforeach;?>
               </select>
               <div class="underline"></div>
               
            </div>
            <div class="input-data">
            <label for="">Choose City</label><br>
             <select name="city" id="cars">
             <?php foreach($cities_row as $city):?>
              <option value="<?php echo $city['id'];?>"><?php echo $city['city'];?></option>
              <?php endforeach;?>
               </select>
               <div class="underline"></div>
               
            </div>
         </div>
         <!-- massage -->
         <div class="form-row">
         <div class="input-data textarea">
            <textarea name="massge" rows="8" cols="80" required></textarea>
            <br />
            <div class="underline"></div>
            <label for="">Write your message</label>
            <?php if(in_array('massge', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid massge </span>';endif; ?>
            <br />
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="submit" name="submit">
               </div>
            </div>
      </form>
      </div>
</body>
</html>