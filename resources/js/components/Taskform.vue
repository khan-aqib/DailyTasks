<template>
                <div class="card">
                    <div class="card-header">Add Your Task</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" 
                                required  placeholder=" Enter some Title">
                         </div>
    
                         <div class="form-group">
                            <label for="name">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" 
                                required placeholder=" Enter some Description">
                         </div>

                         <button class="btn btn-success"  id="title" name="title">
                              <span class="glyphicon glyphicon-plus"></span> Add Task
                        </button>
                    </div>
                </div>
               
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
