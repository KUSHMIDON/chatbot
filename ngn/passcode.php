<?php
   include("header.php");
   include("config.php");
   include("bootstrap.php");
   
   session_start();
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	 
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT user_id,user_name FROM user WHERE passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
		 $sql = "INSERT INTO active_user SELECT * FROM user WHERE passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         
         header("Location: welcome.php");
      }else {
         $error = "Your Login Name or Passcode is invalid";
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
	 
      
   </head>
   
   <body bgcolor = "#FFFFFF">
   
   <audio autoplay>
  <source src="audio/invalidPasscode.mp3" type="audio/mpeg">
  <p>If you can read this, your browser does not support the audio element.</p>
</audio>
   
  
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:28px;"><b>Authentication</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  
                  <label>Passcode   </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
<?php
   include("footer.php");
   
?>