<?php
 
 include("header.php");
   include("config.php");
   $user_name = $_GET['name'];
   
     
   include("bootstrap.php");
   
   
error_reporting(1);
 
//display all uploaded video
 

 
 $sql = "select * from video where user_id = '$user_name'";
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
	<source src="../../phpffmpeg/input/<?php echo $user_name."/".$row['video_name'] ?>.mp4" type="video/mp4">
	</video> 
	<br>
	
	<?php }  ?>
	
	
	<style>
table, th, td {
    border: 3px solid black;
	font-size: 16px;
}
</style>
	
<
</div>

</body>
</html>