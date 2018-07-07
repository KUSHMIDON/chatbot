<?php
include('session.php');
  include("header.php");
   include("config.php");

 

 /*** convert video to flash ***/
 exec("ffmpeg.exe"); // load ffmpeg.exe
 
 
 
  exec("ffmpeg -i ../input/input.mp4 -vf scale=426:240 ../quality/output_240p.mp4");			//240p
  echo "240p successfull";
  
  
  
  exec("ffmpeg -i ../input/input.mp4 -vf scale=640:360 ../quality/output_360p.mp4");			//360p
  echo "360p successfull";
  
//  exec("ffmpeg -i ../input/input.mp4 -vf scale=854:480 ../quality/output_480p.mp4");			//480p
//  echo "480p successfull";
  
//  exec("ffmpeg -i ../input/input.mp4 -vf scale=1280:720 ../quality/output_720p.mp4");			//720p
//  echo "720p successfull";
  
//  exec("ffmpeg -i ../input/input.mp4 -vf scale=1920:1080 ../quality/output_1080p.mp4");			//1080p
//  echo "1080p successfull";
  

  

$dirname = 'C:/wamp64/www/phpffmpeg/quality';

$dir = scandir($dirname);

foreach($dir as $i => $filename)
{
    if($filename == '.' || $filename == '..')
        continue;


 
?>

<html>
<head></head>
<body>
<div align="center">
	 
	 <video controls>
	<source src="../phpffmpeg/quality/<?php echo $filename ?>." type="video/mp4">
	
	
	
	</video> 
	
	<?php 
echo $filename;	
}?>

  
</body>
</html>  

