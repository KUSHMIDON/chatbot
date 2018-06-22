<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome to the FFMPEG Page <?php echo $login_session; ?></h1> 
	  <h4><a href="../phpffmpeg/code/demo.php">Click here to convert the file to different formats</a></h4>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>