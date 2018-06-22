<?php
   include("header.php");
   include("config.php");
   include("bootstrap.php");
   
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	  
	  
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("Location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
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
			font-size:20px;
			padding:10px;
         }
      </style>
	  <iframe
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/e3ea6923-e1b0-4e70-a48d-775021531f7c">
</iframe>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
   <!DOCTYPE html>
<html lang="en-US">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<body>

<div ng-app="">
  <p>Name : <input type="text" ng-model="name"></p>
  <h1>Hello {{name}}</h1>
 
</div>

</body>
</html>
  
   
	
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:28px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName   </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password   </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
					<h2><a href = "register.php">New User Click here</a></h2>
					<h2><a href = "administratorLogin.php">Administrator Login</a></h2>
            </div>
				
         </div>
			
      </div>

   </body>
</html>
<?php
   include("footer.php");
   
?>