<?php
  include("header.php");
   include("config.php");
   
   if ($_POST['action'] && $_POST['id']) {
  if ($_POST['action'] == 'Convert') {
    $filename = $_POST['id'];
	
 

   $files = glob('C:/xampp/htdocs/phpffmpeg/quality/*'); // get all file names
foreach($files as $file){ // iterate files
 if(is_file($file))
   unlink($file); // delete file
}

$files = glob('C:/Users/KUMARYASH/Dropbox/syncoutput/*'); // get all file names
foreach($files as $file){ // iterate files
 if(is_file($file))
   unlink($file); // delete file
}
 

 
 exec("ffmpeg.exe"); // load ffmpeg.exe
 
 
 
  exec("ffmpeg -i ../input/".$filename." -vf scale=426:240 C:/xampp/htdocs/phpffmpeg/quality/240p_".$filename."");			//240p
  echo "240p successfull";
  
  
  exec("ffmpeg -i ../input/".$filename." -vf scale=640:360 C:/xampp/htdocs/phpffmpeg/quality/360p_".$filename."");				//360p
  echo "360p successfull";
  
  exec("ffmpeg -i ../input/".$filename." -vf scale=854:480 C:/xampp/htdocs/phpffmpeg/quality/480p_".$filename."");				//480p
  echo "480p successfull";
  
  exec("ffmpeg -i ../input/".$filename." -vf scale=1280:720 C:/xampp/htdocs/phpffmpeg/quality/720p_".$filename."");				//720p
  echo "720p successfull";
  
//  exec("ffmpeg -i ../input/".$filename." -vf scale=1920:1080 C:/xampp/htdocs/phpffmpeg/quality/1080p_".$filename."");				//1080p
//  echo "1080p successfull";
  
$sql = "Truncate table converted_video";
      $result = mysqli_query($db,$sql);
	  
	  $sql = "ALTER TABLE converted_video AUTO_INCREMENT = 1";
      $result = mysqli_query($db,$sql);

  
  $dirname = 'C:/xampp/htdocs/phpffmpeg/quality';

$dir = scandir($dirname);

foreach($dir as $i => $filename)
{
    if($filename == '.' || $filename == '..')
	{   continue; }
else
{
	


$sql = "insert into converted_video(video_name) values('$filename')";
      $result = mysqli_query($db,$sql);
}
}


 
 //$src = "C:/xampp/htdocs/phpffmpeg/quality";
// $dest = "C:/Users/kumar/Dropbox/syncoutput";


//



function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

recurse_copy('C:/xampp/htdocs/phpffmpeg/quality','C:/Users/KUMARYASH/Dropbox/syncoutput');

echo "<H3>Copy Paste completed!</H3>"; //output when done
  
  
  
  
  
  
  
 header("Location: ../../amc/test.php");


 }
}



?>



