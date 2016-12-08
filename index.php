<?php
   // close connection
   include('db_connect.php');
   ob_start();
   session_start();

   $msg = '';

   // check if form submited
   if (isset($_POST['login'])){
      // get values
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $passwordMd5 = md5($password);

      // check if login data valid
      $sql="SELECT id FROM users WHERE username='$username' and password='$passwordMd5'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      if ($count == 1 ){
         $_SESSION['username'] = $username;
         header("Location: home.php");
      }else{
         $msg = 'Username or password invalid!';
      }
   }
   // close connection to db
   mysqli_close($db);       
?>


<html lang = "en">
   
   <head>
      <title>Login - Back Office</title>
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
      
      <h2>Login</h2> 
      <div class = "container form-signin">
         
       
      </div> 
      
      <div class = "container">
      <a href = "register.php" title = "home">Register</a>
         <form class = "form-signin" role = "form" 
            action = "" method = "post">
            <h4 class = "form-signin-heading" style="color: red;"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
         
      </div> 
      
   </body>
</html>