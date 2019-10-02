@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <br>
                    <div id="vue-block">
                         
                         <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" 
                                required v-model="newTask.title" placeholder=" Enter some Title">
                         </div>
    
                         <div class="form-group">
                            <label for="name">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" 
                                required v-model="newTask.description" placeholder=" Enter some Description">
                         </div>

                         <button class="btn btn-success"  @click.prevent="createTask()" id="title" name="title">
                              <span class="glyphicon glyphicon-plus"></span> Add Task
                        </button>

                      <br><br>
                      

                    <br><br>
                         <table id="tasks" class="text-center display table table-bordered table-striped">
                             <tr>
                                 
                                 <th>Title</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                             <tr v-for="task in tasks">
                                 
                                  <td>@{{task.title}}</td>
                                  <td>@{{task.description}}</td>
                                  <td v-if="task.status == 0"> created </td>
                                  <td v-else-if="task.status == 1"> Working </td>
                                  <td v-else-if="task.status == 3"> Finished </td>
                                  <td v-else-if="task.status == 2"> cancel </td>                                  
                                   <td>
                                           <div class="dropdown">
                                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Action
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button  @click.prevent="workingStatus(task)" class="dropdown-item" >Working</button>                                                    
                                                    <button  @click.prevent="cancel(task)" class="dropdown-item" >Cancel</button>   
                                                    <button  @click.prevent="finish(task)" class="dropdown-item" >Finish</button>   
                                                    <button  @click.prevent="deleteItem(task)" class="dropdown-item">Delete</button>
                                              </div>
                                           </div>
                                    </td>
                             </tr>
                         </table>
                    </div><!--/vue wrapper-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
