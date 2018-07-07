<?php
   include("header.php");
   include("config.php");
   include("bootstrap.php");
   
   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	 
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
	 $sqlname = "SELECT user_name FROM active_user";
      $resultname = mysqli_query($db,$sql);
	  
	$sql = "INSERT into video_path values($resultname,$mypassword)";
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
      <title>NGN PROJECT</title>
      
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
   
  
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:28px;"><b>VIDEO</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  
                  <label>Video_Path   </label><input type = "password" name = "password" class = "box" /><br/><br />
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