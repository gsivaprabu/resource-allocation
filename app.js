var app = new Vue({
	el: '#members',
	data:{
		showAddModal: false,
		showEditModal: false,
		showDeleteModal: false,
		errorMessage: "",
		successMessage: "",
		server_details: [],
		newMember: {firstname: '', lastname: ''},
		newServer: {id: '',server_name: '', server_ip: '',server_details: ''},
		clickMember: {}
	},

	mounted: function(){
		this.getAllMembers();
	},

	methods:{
		getAllMembers: function(){
			axios.get('api.php')
				.then(function(response){
					console.log(response);
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.server_details = response.data.server_details;
					}
				});
		},

		saveServerDetails: function(){
			//console.log(app.newMember);
			var serverForm = app.toFormData(app.newServer);
			axios.post('api.php?crud=create', serverForm)
				.then(function(response){
					//console.log(response);
					app.newMember = {server_name: '', server_ip:'', server_details:''};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		updateMember(){
			var serverForm = app.toFormData(app.clickMember);
			axios.post('api.php?crud=update', serverForm)
				.then(function(response){
					//console.log(response);
					app.clickMember = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		deleteMember(){
			var serverForm = app.toFormData(app.clickMember);
			axios.post('api.php?crud=delete', serverForm)
				.then(function(response){
					//console.log(response);
					app.clickMember = {};
					if(response.data.error){
						app.errorMessage = response.data.message;
					}
					else{
						app.successMessage = response.data.message
						app.getAllMembers();
					}
				});
		},

		selectMember(member){
			app.clickMember = member;
			console.log('app.clickMember',  app.clickMember);
		},

		toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
			}
			return form_data;
		},

		clearMessage: function(){
			app.errorMessage = '';
			app.successMessage = '';
		}

	}
});