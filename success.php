<?php
	session_start();
	$conn = new mysqli("localhost", "root", "", "resource-allocation");
 
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
	<title>Welcome <?php echo $row['full_name']; ?> </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	

<script>
$(function() {
  $('input[name="datetimes"]').daterangepicker({
    timePicker: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'M/DD hh:mm A'
    }
  });
});
</script>
</head>

<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">Welcome, <?php echo $row['full_name']; ?>!</h1>
		</div>
			<a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
			<a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	<div>
			<?php
	$sql="select * from server_details";
	$result = $conn->query($sql);

	
	?>


			<table class="table">
				<thead>
					<tr>
						<th>S#</th>
						<th>Server Name</th>
						<th>Server IP</th>
						<th>Server Details</th>
						<th>Status</th>
						<th>Action</th>
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
						if ($row["id"]==1) { ?>

						<td> Free</td>

						<?php } else {?>

						<td> Using</td>

						<?php } ?>

						<?php if ($row["id"]==1) { ?>

						<td> Free</td>

						<?php } else {?>

						<td> Using</td>
						
						<?php } ?>
							
						</tr>


		<?php }
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