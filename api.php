<?php

$conn = new mysqli("localhost", "root", "", "crud");
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$out = array('error' => false);

$crud = 'read';

if(isset($_GET['crud'])){
	$crud = $_GET['crud'];
}


if($crud == 'read'){
	$sql = "select * from server_details";
	$query = $conn->query($sql);
	$server_details = array();

	while($row = $query->fetch_array()){
		array_push($server_details, $row);
	}

	$out['server_details'] = $server_details;
}

if($crud == 'create'){

	$server_name=$_POST['server_name'];
	$server_ip=$_POST['server_ip'];
	$server_details=$_POST['server_details'];

	$sql = "insert into server_details (server_name, server_ip, server_details) values ('$server_name', '$server_ip', '$server_details')";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Server Added Successfully";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Could not add Server Details";
	}
	
}

if($crud == 'update'){

	$id = $_POST['id'];
	$server_name = $_POST['server_name'];
	$server_ip = $_POST['server_ip'];
	$server_details = $_POST['server_details'];

	$sql = "update server_details set server_name='$server_name', server_ip='$server_ip',server_details='$server_details' where id='$id'";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Server Details Updated Successfully";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Could not update Server Details";
	}
	
}

if($crud == 'delete'){

	$serverId = $_POST['id'];

	$sql = "delete from server_details where id='$serverId'";
	
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Server Deleted Successfully";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Could not delete Server";
	}
	
}


$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();


?>