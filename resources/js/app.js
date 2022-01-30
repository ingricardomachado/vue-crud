//require('./bootstrap');
new Vue({
	el: '#crud',
	created: function() {
		this.getCategories();
		this.getKeeps();
	},
	data: {
		categories: [],
		keeps: [],
		category:'',
		newKeep:'',
		fillKeep: {'id':'', 'keep':''},
		errors: []
	},
	methods: {
		getCategories: function () {
			var urlCategories = 'categories';
			axios.get(urlCategories).then(response => {
				this.categories = response.data
			})
		},
		getKeeps: function () {
			var urlKeeps = 'tasks';
			axios.get(urlKeeps).then(response => {
				this.keeps = response.data
			})
		},
		createKeep: function() {
			var url= 'tasks';
			axios.post(url, {
				category_id: this.category,
				keep: this.newKeep,
			}).then(response => {
				this.getKeeps();
				this.newKeep='';
				this.errors=[];
				$('#create').modal('hide');
				toastr.success(response.data.message);
			}).catch(error => {
				if(error.response.status == 422){
					var errorsHtml='';
					$.each(error.response.data.errors, function (key, value) {
              			errorsHtml += '<li>' + value[0] + '</li>'; 
            		});          
					toastr.error(errorsHtml);					
				}else{
					toastr.error(error.response.data.message);
				}
			})
		},		
		editKeep: function (keep) {
			this.fillKeep.id = keep.id;
			this.fillKeep.category = keep.category_id;
			this.fillKeep.keep = keep.keep;
			$('#edit').modal('show');
		},
		updateKeep: function (id) {
			var url='tasks/' + id;
			axios.put(url, {
				category_id: this.fillKeep.category,
				keep: this.fillKeep.keep,
			}).then(response => {
				this.getKeeps();
				this.fillKeep = {'id':'', 'keep':''};
				this.errors=[];
				$('#edit').modal('hide');
				toastr.success(response.data.message);
			}).catch(error => {
				if(error.response.status == 422){
					var errorsHtml='';
					$.each(error.response.data.errors, function (key, value) {
              			errorsHtml += '<li>' + value[0] + '</li>'; 
            		});          
					toastr.error(errorsHtml);					
				}else{
					toastr.error(error.response.data.message);
				}
			})
		},		
		deleteKeep: function (keep) {
			var url='tasks/' + keep.id;
			axios.delete(url).then(response => {
				this.getKeeps();
				toastr.success('Eliminado correctamente');
			});
		},
	}
});

