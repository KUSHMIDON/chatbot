<?php
   
   include("header.php");
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	  
	  $sql = "TRUNCATE TABLE USER_INPUT";
      $result = mysqli_query($db,$sql);
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
    
	  
      $sql = "INSERT into user_requests(username,password,email) values ('$myusername','$mypassword','$myemail')";
      $result = mysqli_query($db,$sql);
        header("Location: register.php");
      
   }
?>
<html>
   
   <head>
      <title>AMC PROJECT</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:20px;
         }
         
         .box {
            border:#666666 solid 1px;
			padding:10px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
   
	
      <div align = "center">
         <div style = "width:350px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:28px;"><b>Register</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName   </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password   </label><input type = "password" name = "password" class = "box" /><br/><br />
				  <label>Email   </label><br/><input type = "text" name = "email" class = "box"/><br /><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
					<h2><a href = "login.php">Login</a></h2>
					<h2><a href = "administratorLogin.php">Administrator Login</a></h2>
				
            </div>
				
         </div>
			
      </div>

   </body>
</html>
<?php
   include("footer.php");
   
?>