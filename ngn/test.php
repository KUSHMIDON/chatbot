<?php
 
 include("header.php");
   include("config.php");
    
     
   include("bootstrap.php");
   
   
error_reporting(1);
 
?>

<html>
<head>
<br>
<br>
<h2 align="center">To view Converted  Video List</h2></head>
<br>
<br>

<?php
 
//extract($_POST);
 
//$target_dir = "../phpffmpeg/input/";
 
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 
 
//display all uploaded video
 
//if($disp)
 
//{
 
 $sql = "select * from converted_video";
      $result = mysqli_query($db,$sql);
	 

	while($row=mysqli_fetch_array($result))
 
	{
		 $message = "success";
?>

<body>
<div align="center">

<h3 align="center" color="red"><?php echo $row['video_name'] ?></h3>
<br>

	 
	 <video controls>
	<source src="../phpffmpeg/quality/<?php echo $row['video_name'] ?>" type="video/mp4">
	</video> 
	<br>
	
<?php }  ?>
	
	
	
	
</div>
<br>
<br>
<h2 align='center'><a href = "welcome.php">Start Page</a></h2>
</body>
</html>