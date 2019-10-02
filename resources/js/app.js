/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('task-form', require('./components/Taskform.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#vue-block',

    data: {
          newTask: {'title': '', 'description': ''},
          hasError: true,
          hasDeleted: true,
          tasks: [],
    },
	
	mounted: function mounted(){
		this.getTasks();
	},
    
    methods: {

    	getTasks: function getTasks(){
    		 var _this = this;
            axios.get('/getTasks').then(function(response){
               _this.tasks = response.data;//response. data  where data is default object retured from get request
            })
    	},
    	setVal(val_id, val_title, val_description, val_status) {
	        this.e_id = val_id;
	        this.e_title = val_title;
	        this.e_description = val_description;
	        this.e_status = val_status;
       
        },

	     createTask: function createTask(){
	        var input = this.newTask;
	        var _this = this;
	        if(input['title'] == '' || input['description'] == ''){
	        	this.hasError = false;
	        }
	        else{
	           this.hasError = true;
	           axios.post('/home',input).then(function(response){
                    _this.newTask = {'title': '', 'description': ''};
                    _this.getTasks();
	           })	
	        }
	     },
        
	     deleteItem: function deleteItem(task){
             var _this = this;
			 axios.post('/deleteTask/' + task.id).then(function (response) {
			        _this.getTasks();
			         _this.hasError = true; 
                    _this.hasDeleted = false;
			})
	     },

	     workingStatus: function workingStatus(task){
	     	var _this = this;
	     	 axios.post('/changeTask/' + task.id).then(function (response) {
			        _this.getTasks();
			})

	     },
	     cancel: function cancel(task){
	     	var _this = this;
	     	 axios.post('/cancel/' + task.id).then(function (response) {
			        _this.getTasks();
			})

	     },
	     finish: function finish(task){
	     	var _this = this;
	     	 axios.post('/finish/' + task.id).then(function (response) {
			        _this.getTasks();
			})
	     }


    }

});
