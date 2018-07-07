<?php
   
   include("header.php");
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	  
	   $sql = "TRUNCATE TABLE USER_INPUT";
      $result = mysqli_query($db,$sql);
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
     
	  
      $sql = "INSERT into user_input(str) values ('$myusername')";
      $result = mysqli_query($db,$sql);
        header("Location: ngn1.php");
      
   }
?>
<!DOCTYPE html>
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
			padding:10px;
         }
      </style>
	  
	  <script type="text/javascript">
    window.onload=function(){
		
        var auto = setTimeout(function(){ autoRefresh(); }, 100);
		
        function submitform()
		{
          //alert('test');
          document.forms["myForm"].submit();
        }

        function autoRefresh()
		{
           clearTimeout(auto);
		   
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 12000);
		
        }
    }
</script>
      
   </head>
   
   <body bgcolor = "#FFFFFF">


	
      <div align = "center">
         <div style = "width:500px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:28px;"><b>Lets CHAT</b></div>
				
            <div style = "width:400px;margin:10px" align = "center">
               
               <form action = "" method = "post" id="myForm" name="myForm">
			   <div style = "background-color:#333333; color:#FFFFFF; padding:30px; font-size:18px;"><b>Tell me what to do !   </b></div>
                  <br><input type = "text" name = "username" class = "box" autofocus="autofocus"/><br /><br />
                
                  <input type = "submit" value = " Submit "/><br />
               </form>
			   
			   
               
		
				
            </div>
				
         </div>
			
      </div>
	  
	 
	  
   </body>
</html>
<?php
   include("footer.php");
   
?>