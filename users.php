<?php
   ob_start();
   session_start();
?>


<html lang = "en">
   
   <head>
      <title>All Users - Back Office</title>
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
      <a href = "home.php" title = "home">Home</a> | <a href = "users.php" tite = "all users">List all users</a>  | <a href = "logout.php" title = "Logout">Logout</a>
      <br/>
      <h2>All users</h2>
         <div style="margin-top: 50px;">
         <?php
            // connect to db
            include('db_connect.php');

            // get users
            $sql="SELECT * FROM users order by created DESC";
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);
            if ($count > 0){
               echo '<table style="border:1px solid black;">';
               echo '<tr><td style="width:150px; font-weight:bold; text-align:center;">Username</td><td style="width:150px; font-weight:bold; text-align:center;">Created</td></tr>';
               while ($row = mysqli_fetch_array($result)) {
                  echo '<tr><td style="border:1px solid black; padding-left:10px;">'.$row['username'].'</td><td style="border:1px solid black; padding-left:5px;">'.date('d.m.Y. H:i:s', strtotime($row['created'])).'</td></tr>'; 
               }
               echo '</table>';
            }
            // close conn
            mysqli_close($db);
         ?>
         </div> 
      </div> 
      
   </body>
</html>