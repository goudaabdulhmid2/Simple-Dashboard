<?php
 require '../../config/admins.php';
 session_start();
 //session_regenerate_id();
 $admin = new Admins();
 $error_fields=[];
 $id=$_SESSION['id_n'];
 if(isset($_SESSION['admin_id']) && $admin->checkLevel($_SESSION['admin_id']) && isset($id)){
  
   $old_data = $admin->getUser($id);
   if($_SERVER['REQUEST_METHOD'] === 'POST')
   {
   
     if(!(!empty((trim($_POST['name']))))){
        $error_fields[] = 'name';
     }
     if(!(isset($_POST['email']) && filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL))){
        $error_fields[] = 'email';
     }
    //  if(!(isset($_POST['new_password']) && strlen($_POST['new_password'] )>8 )){
    //     $error_fields[] = 'new_password';
    //  }
     if(!(isset($_POST['admin_password']) && $admin->checkPassword($_SESSION['admin_id'],$_POST['admin_password']))){
        $error_fields[] = 'admin_password';
     }
     if(!(isset($_POST['type']))){
        $error_fields[] = 'type';
     }

     if(!$error_fields){

        $name = htmlentities($_POST['name']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        if(!empty($_POST['new_password'])){
          $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        }
        $superAdmin= htmlentities($_POST['type']);
     if(!empty($_POST['new_password'])){
        $data=[
            'name'=> $name,
            'email'=> $email,
            'password'=> $password,
            'superAdmain'=> $superAdmin
        ];
    }else{
            $data=[
                'name'=> $name,
                'email'=> $email,
                'superAdmain'=> $superAdmin
            ];
        }

        $admin->updateUser($id,$data);
        header('location:update.php?id='.$id.'');
        exit;
        

     }

    }
 }else{
    header('location:../logout.php');
    exit;
 }


?>


<?php include '../../inc/header.php';?>


<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
  <div class="form-group">
    <label for="adminName">Name:</label>
    <?php if(in_array('name', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid name </span>';endif; ?>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo $old_data['name'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <?php if(in_array('email', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid email </span>';endif; ?>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" value="<?php echo $old_data['email'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Change Password:</label>
    <?php if(in_array('new_password', $error_fields)): echo ' <span class="error" style="color: red">Please enter a valid password </span>';endif; ?>
    <input name="new_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Admin Password:</label>
    <?php if(in_array('admin_password', $error_fields)): echo ' <span class="error" style="color: red">Your password is not correct </span>';endif; ?>
    <input name="admin_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Type:</label>
    <?php if(in_array('type', $error_fields)): echo ' <span class="error" style="color: red"> requird </span>';endif; ?>
    <br>
    <select name="type" id="cars">
             
              <option value="0">Admin</option>
              <option value="1">Super Admin</option>       
    </select>
  </div>
  <br>
  <input type="submit" name="submit" value="Submit" class='btn btn-primary'>
</form>
</div>









<?php include '../../inc/footer.php';?>