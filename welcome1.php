<?php
   
   include('header.php');
    
   include("bootstrap.php");
   
?>
<html>
   
   <head>
      <title>Welcome </title>
	  <style>
table, th, td {
    border: 10px solid black;
}
</style>
   </head>
   
   <body>
   <div align="center">
      <h1>Welcome <?php echo $login_session; ?></h1> 
	  <br>
	  <br>
	  <table style="width:70%">
	  <tr>
	  <td align="center"><h2><a href= "passvalues.php">Click here to go to FFMPEG page</a></h2></td>
	  <td align="center"><h2><a href = "upload.php">Click to upload file</a></h2></td>
	  </tr>
	  <tr>
	  
	  <td align="center"><h2><a href = "uploadandconvert.php">Click to Upload and Convert directly</a></h2></td>
	  
	  <td align="center"><h2><a href = "https://www.dropbox.com/sh/l380w5wx88rqfbt/AABp4cBahO5k4wfFSD0nsjHfa?dl=0" target="_blank">Drop Box File Synchronization</a></h2></td>
	  
	  
	  
	  
	  
	  
	  
	  
	  </tr>
	  </table>
	   <br>
	  <br>
	  <td align="center"><h2><a href = "https://drive.google.com/drive/folders/1Y_PjctptZgXhHL8Xxe_ahvxxqiT20FFX?usp=sharing" target="_blank">Sample Videos</a></h2></td>
	  <br>
	  <br>
      <h2><a href = "logout.php">Sign Out</a></h2>
	  </div>
   </body>
   
</html>