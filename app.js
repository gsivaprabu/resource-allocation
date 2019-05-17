var app = new Vue({
	el: '#servers',
	data: {
		successMessage: "",
		errorMessage: "",
		logDetails: { username: '', password: '' },

		showAddModal: false,
		showEditModal: false,
		showDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		server_details: [],
		newServer: { id: '', server_name: '', server_ip: '', server_details: '' },
		clickServer: {}
	},

	mounted: function () {
		this.getServers();
	},

	methods: {

		logout:function(){
			window.location.href = "logout.php";
		},

		keymonitor: function (event) {
			if (event.key == "Enter") {
				app.checkLogin();
			}
		},
		
		checkLogin: function () {
			var logForm = app.toFormData(app.logDetails);
			axios.post('login.php', logForm)
				.then(function (response) {

					if (response.data.error) {
						app.errorMessage = response.data.message;
					}
					else {
						app.successMessage = response.data.message;
						app.logDetails = { username: '', password: '' };
						setTimeout(function () {
							window.location.href = "server-details.php";
						}, 1);

					}
				});
		},

		toFormData: function (obj) {
			var form_data = new FormData();
			for (var key in obj) {
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function () {
			app.errorMessage = '';
			app.successMessage = '';
		},

		getServers: function () {
			axios.get('api.php')
				.then(function (response) {
					if (response.data.error) {
						app.errorMessage = response.data.message;
					}
					else {
						app.server_details = response.data.server_details;
					}
				});
		},

		saveServerDetails: function () {
			var serverForm = app.toFormData(app.newServer);
			axios.post('api.php?crud=create', serverForm)
				.then(function (response) {
					app.newServer = { server_name: '', server_ip: '', server_details: '' };
					if (response.data.error) {
						app.errorMessage = response.data.message;
					}
					else {
						app.successMessage = response.data.message
						app.getServers();
					}
				});
		},

		updateServer() {
			var serverForm = app.toFormData(app.clickServer);
			axios.post('api.php?crud=update', serverForm)
				.then(function (response) {
					app.clickServer = {};
					if (response.data.error) {
						app.errorMessage = response.data.message;
					}
					else {
						app.successMessage = response.data.message
						app.getServers();
					}
				});
		},

		deleteServer() {
			var memForm = app.toFormData(app.clickServer);
			axios.post('api.php?crud=delete', memForm)
				.then(function (response) {
					app.clickServer = {};
					if (response.data.error) {
						app.errorMessage = response.data.message;
					}
					else {
						app.successMessage = response.data.message
						app.getServers();
					}
				});
		},

		selectServer(server) {
			app.clickServer = server;
		},

		toFormData: function (obj) {
			var form_data = new FormData();
			for (var key in obj) {
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function () {
			app.errorMessage = '';
			app.successMessage = '';
		}

	}
});