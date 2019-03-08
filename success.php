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
			<table class="table table-hover">
				<thead>
					<tr>
						<th>S#</th>
						<th>Server Name</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>10.0.124.75</td>
						<td>siva Using</td>
					</tr>
					<tr>
						<td>2</td>
						<td>10.0.125.6</td>
						<td>Kalai using</td>
					</tr>
					<tr>
						<td>3</td>
						<td>10.123.56.9</td>
						<td>Free</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>