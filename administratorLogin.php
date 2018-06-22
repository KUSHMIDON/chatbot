<?php
   include("header.php");
   include("config.php");
   
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	  
	  
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM adminlogin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("Location: adminpage.php");
      }else {
         $error = "Sorry you are not an Administrator";
      }
   }
?>
<html>
   
   <head>
      <title>AMC PROJECT</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:20px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:20px;
         }
         
         .box {
            border:#666666 solid 1px;
			font-size:20px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
   
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:22px;"><b>Administrator Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
		
            </div>
				
         </div>
			
					<h2><a href = "login.php">Login</a></h2>
      </div>

   </body>
</html>
<?php
   include("footer.php");
   
?>