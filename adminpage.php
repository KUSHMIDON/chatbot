<?php
   include('session.php');
   $message = "";
?>
<html">
   
   <head>
      <title>Admin Page </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
	  
	  
	  
	  <?php


$sql = 'SELECT * FROM user_requests order by id asc';
		
$query = mysqli_query($db, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($db));
}


if($_SERVER["REQUEST_METHOD"] == "POST") 
{
       
      
      $requestId = mysqli_real_escape_string($db,$_POST['requestId']);
	  
      
	  $sql = "INSERT INTO admin(username,passcode) SELECT username,password from user_requests where id='$requestId'";
      
      $result = mysqli_query($db,$sql);
	  
	  $sql = "DELETE from user_requests where id='$requestId'";
      
      $result = mysqli_query($db,$sql);
	  
        $message = "The access has been granted to the user successfully";
		
		$sql = "DELETE from user_requests where id='$requestId'";
      
      $result = mysqli_query($db,$sql);
      
   }
   
   


?>

<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	<h1>Real Time Cloud Computing</h1>
	<table class="data-table">
		<caption class="title">User Access Requests</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>EMAIL</th>
				
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['password'].'</td>
					<td>'.$row['email'].'</td>
				</tr>';
		}?>
		</tbody>
		
	</table>
	<br>
	<br>
	<div align = "center">
	<h3>To Grant Access, Enter the user id below</h3>
	
	<form action = "" method = "post">
                  <label>User Request Id   </label><input type = "text" name = "requestId"/><br /><br />
                  
                  <input type = "submit" value = "Give Access" name="giveaccess"/><br />
               </form>
			   
			   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $message; ?></div>
	</div>
	
	
	
</body>
</html>
	  
	  
      <h2 align='center'><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>