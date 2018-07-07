<?php
 include("header.php");
   include("config.php");
   $video_name = $_GET['vname'];
   $user_name = $_GET['uname'];
   
     
   include("bootstrap.php");
   
   

?>


<!DOCTYPE html>
<html>
<body align="center">
</br>
</br>

<h4 style="color:red;"><?php echo $video_name?></h4>
<video align="center" controls autoplay>
  <source src="../../phpffmpeg/input/<?php echo $user_name."/".$video_name?>" type="video/mp4">
  Your browser does not support the video tag.
</video>

</body>
</html>