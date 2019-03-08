<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "vuelogin");
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
		header('location:index.php');
	}

	$sql="select * from user where userid='".$_SESSION['user']."'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

?>
<!DOCTYPE html>
<html>

<head>
	<title>Welcome <?php echo $row['username']; ?> </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">Welcome, <?php echo $row['full_name']; ?>!</h1>

			<a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
		</div>
		<div>
			<?php
	$sql="select * from server_details";
	$result = $conn->query($sql);

	
	?>


			<table class="table table-hover">
				<thead>
					<tr>
						<th>S#</th>
						<th>Server Name</th>
						<th>Server IP</th>
						<th>Server Details</th>
					</tr>
				</thead>
				<tbody>
					<?php


				if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			            echo "<tr>";
						echo	"<td>".$row["id"]."</td>";
						echo	"<td>".$row["server_name"]."</td>";
						echo	"<td>".$row["server_ip"]."</td>";
						echo	"<td>".$row["server_details"]."</td>";
					    echo "</tr>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	

					
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>