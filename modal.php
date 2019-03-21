<!-- Add Modal -->
<div class="myModal" v-if="showAddModal">
	<div class="modalContainer">
		<div class="modalHeader">
			<span class="headerTitle">Add New Server</span>
			<button class="closeBtn pull-right" @click="showAddModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>Server Name:</label>
				<input type="text" class="form-control" v-model="newServer.server_name">
			</div>
			<div class="form-group">
				<label>Server IP:</label>
				<input type="text" class="form-control" v-model="newServer.server_ip">
			</div>
			<div class="form-group">
				<label>Server Details:</label>
				<input type="text" class="form-control" v-model="newServer.server_details">
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" @click="showAddModal = false"><span
						class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-primary"
					@click="showAddModal = false; saveServerDetails();"><span class="glyphicon glyphicon-floppy-disk"></span>
					Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<div class="myModal" v-if="showEditModal">
	<div class="modalContainer">
		<div class="editHeader">
			<span class="headerTitle">Edit Server</span>
			<button class="closeEditBtn pull-right" @click="showEditModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>Server Name:</label>
				<input type="text" class="form-control" v-model="clickServer.server_name">
			</div>
			<div class="form-group">
				<label>Server Ip:</label>
				<input type="text" class="form-control" v-model="clickServer.server_ip">
			</div>
			<div class="form-group">
				<label>Server Details:</label>
				<input type="text" class="form-control" v-model="clickServer.server_details">
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" @click="showEditModal = false"><span
						class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success"
					@click="showEditModal = false; updateServer();"><span class="glyphicon glyphicon-check"></span>
					Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Delete Modal -->
<div class="myModal" v-if="showDeleteModal">
	<div class="modalContainer">
		<div class="deleteHeader">
			<span class="headerTitle">Delete Server</span>
			<button class="closeDelBtn pull-right" @click="showDeleteModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<h5 class="text-center">Are you sure you want to Delete</h5>
			<h2 class="text-center">{{clickServer.server_name}}</h2>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" @click="showDeleteModal = false"><span
						class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger"
					@click="showDeleteModal = false; deleteServer(); "><span class="glyphicon glyphicon-trash"></span>
					Yes</button>
			</div>
		</div>
	</div>
</div>