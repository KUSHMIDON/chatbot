<?php
 
 include("header.php");
   include("config.php");
   
     
   include("bootstrap.php");
   
   
error_reporting(1);
 

 
extract($_POST);
 
$target_dir = "../phpffmpeg/input/";
 
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 
if($upd)
{
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
{
    $message = "File Format Not Supported";
} 
 
else
{
 
$video_path=$_FILES['fileToUpload']['name'];


//$sql = "Truncate table video";
//      $result = mysqli_query($db,$sql);
	  
//	  $sql = "ALTER TABLE video AUTO_INCREMENT = 1";
//      $result = mysqli_query($db,$sql);



$sql = "insert into video(video_name) values('$video_path')";
      $result = mysqli_query($db,$sql);

 
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
 
$message = "uploaded ";
 
}
 
}
 
//display all uploaded video
 
if($disp)
 
{
 
 $sql = "select * from video";
      $result = mysqli_query($db,$sql);
	 

	while($row=mysqli_fetch_array($result))
 
	{
		 $message = "success";
?>
<html>
<head></head>
<body>

<div align="center">
	 <h3><?php echo $row['video_name'] ?></h3>
	 <video width="400" height="300" controls>
	<source src="../phpffmpeg/input/<?php echo $row['video_name'] ?>." type="video/mp4">
	</video> 
	<br>
	
	<?php } } ?>
	
	
	<style>
table, th, td {
    border: 3px solid black;
	font-size: 16px;
}
</style>
	
<h3 align="center">UPLOAD VIDEO</h3>	
<form action="" method="post" enctype="multipart/form-data">
 
<table  style="width:30%" align="center">
 
<tr align="center"><td  height="100"><input type="file" name="fileToUpload"/></tr>
 
<tr><td  height="100" align="center">
 <br>
<input type="submit" value="Upload Video" name="upd"/>&nbsp;&nbsp
 
<input type="submit" value="Display Video" name="disp"/>

<br>
<br>

 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $message; ?></div>
 
</td></tr>
 
</table>
 
</form>
</div>



<h2 align='center'><a href= "passvalues.php">FFMPEG PAGE</a>
<h2 align='center'><a href = "welcome.php">HOME</a></h2>
</body>
</html>