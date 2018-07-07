<?php

   include('session.php');
    
   include("bootstrap.php");
   
?>




<html>
   
   <head>
      <title>My Videos </title>
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
			font-size: 36px;
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



<?php


$sql = 'SELECT * FROM video';
		
$query = mysqli_query($db, $sql);
?>

   
   <body align="center">
      <h1>Welcome to the FFMPEG Page</h1> 
	  
	  
	 <h3>VIDEO LIST</h3>
	  <table class="data-table">
		
		<thead>
			<tr>
				<th>ID</th>
				<th>VIDEO NAME</th>
				<th>VIEW</th>
				
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
		{
			?>
			<tr>
			<td><?php echo $row['v_id']; ?></td>
			<td><?php echo $row['video_name']; ?></td>
					<td>
      <form method="post" action="../phpffmpeg/code/demo.php">
        <input type="submit" name="action" value="Convert"/>
        <input type="hidden" align="center" name="id" value="<?php echo $row['video_name']; ?>"/>
      </form>
    </td>
				</tr>
	<?php	}?>
		</tbody>
		
	</table>
	   <h2 align='center'><a href = "welcome.php">HOME</a></h2>
	   <br>
	  
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>

