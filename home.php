<?php
   ob_start();
   session_start();
?>


<html lang = "en">
   
   <head>
      <title>Home - Back Office</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
        
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      <div class = "container">
      <a href = "home.php" title = "home">Home</a> | <a href = "users.php" tite = "all users">List all users</a> | <a href = "logout.php" tite = "Logout">Logout</a>
      <br/>
      <h2>Hello <?php echo $_SESSION['username']; ?></h2> 
         
      </div> 
      
   </body>
</html>