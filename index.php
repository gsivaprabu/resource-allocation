<!DOCTYPE html>
<html>
<head>
	<title>Vue.js CRUD Operation using PHP/MySQLi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">RESOURCE ALLOCATION</h1>
	<div id="members">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-md-12">
					<h2>Server List
					<button class="btn btn-primary pull-right" @click="showAddModal = true"><span class="glyphicon glyphicon-plus"></span> Add Server</button>
					</h2>
				</div>
			</div>

			<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>
			
			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
			</div>

			<table class="table table-bordered">
				<thead>
					<th>Id</th>
					<th>Server Name</th>
					<th>Server IP</th>
					<th>Server Details</th>
					<th>Action</th>
				</thead>
				<tbody>
					<tr v-for="server in server_details">
						<td align="center">{{ server.id }}</td>
						<td align="center">{{ server.server_name }}</td>
						<td align="center">{{ server.server_ip }}</td>
						<td align="center">{{ server.server_details }}</td>
						<td align="center">
							<button class="btn btn-success" @click="showEditModal = true; selectMember(server_details);"><span class="glyphicon glyphicon-edit"></span> Edit</button> 
							
							<button class="btn btn-danger" @click="showDeleteModal = true; selectMember(server.id);"><span class="glyphicon glyphicon-trash"></span> Delete</button>

						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<?php include('modal.php'); ?>
	</div>
</div>
<script src="vue.js"></script>
<script src="axios.js"></script>
<script src="app.js"></script>
</body>
</html>