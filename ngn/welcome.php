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
   
   <audio autoplay>
  <source src="audio/welcometohomepage.mp3" type="audio/mpeg">
  <p>If you can read this, your browser does not support the audio element.</p>
</audio>
   
   <div align="center">
      <h1>SELECT FROM BELOW OPTIONS</h1> 
	  <br>
	  <br>
	  <table style="width:70%">
	  <tr>
	  <td align="center"><h2>View Playlist</h2></td>
	  <td align="center"><h2>Upload Video</h2></td>
	  </tr>
	  <tr>
	  
	  <td align="center"><h2>My Dropbox</h2></td>
	  
	  <td align="center"><h2>Call a friend</h2></td>	  
	  
	  
	  </tr>
	  </table>
	   <br>
	  <br>
	  <td align="center"><h2><a href = "https://drive.google.com/drive/folders/1Y_PjctptZgXhHL8Xxe_ahvxxqiT20FFX?usp=sharing" target="_blank">Sample Videos</a></h2></td>
	  <br>
	  <br>
      <h2><a href = "logout.php">Log Out</a></h2>
	  </div>
   </body>
   
</html>