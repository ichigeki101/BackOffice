<?php
   include('db_connect.php');
   $msg = '';
   $success = '';
   if (isset($_POST['register'])){
      try{
         $username = mysqli_real_escape_string($db,$_POST['username']);
         $password = mysqli_real_escape_string($db,$_POST['password']);

         
         if (empty($username) || empty($password)) throw new Exception('Username or password invalid!');
         // check username existance
         $sql_check_username = "SELECT * FROM users WHERE username ='$username'";
         $check_result = mysqli_query($db,$sql_check_username);
         $check_count = mysqli_num_rows($check_result);
         if ($check_count > 0) throw new Exception('Username already exists!');
         
         $passwordMd5 = md5($password);
         $sql = "INSERT INTO users (username, password,active) values ('$username', '$passwordMd5', '1')";
         $result = mysqli_query($db,$sql);
         if (!$result) throw new Exception('Error! Try again!');
         $success = 'Success! You created account.';
         
      }catch(Exception $e){
         $msg = $e->getMessage();
      } 
      
   }
  mysqli_close($db);           
?>


<html lang = "en">
   
   <head>
      <title>Register - Back Office</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Register</h2> 
      <div class = "container form-signin">
         
       
      </div> 
      
      <div class = "container">
      <a href = "index.php" title = "home">Login</a>
         <form class = "form-signin" role = "form" 
            action = "" method = "post">
            <h4 class = "form-signin-heading" style="color: red;"><?php echo $msg; ?></h4>
            <h4 class = "form-signin-heading"><?php echo $success; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" 
               required autofocus></br>
            <input type = "text" class = "form-control"
               name = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "register">Register</button>
         </form>
         
      </div> 
      
   </body>
</html>