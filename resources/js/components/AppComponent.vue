
<template>

    <div class="App-Component" >


        <table class="table table-striped">
                <thead>
                    <tr class="text-info" >
                        <th class=" text-capitalize" >Number</th>
                        <th class=" text-capitalize" >Task title</th>
                        <th  class=" text-capitalize">Priority Level</th>
                        <th  class="text-capitalize"> Action</th>
                    </tr>
                </thead>
                <tbody>

                            <task-component v-for="(task, index) in tasks " :key="index" :task="task" @delete="remove" ></task-component>
                    <tr>
                        <td scope="row form-group">
                            <input v-model="task.title"  type="text" name="task" id="task" class="form-control" placeholder="Type your task..." >

                        </td>
                        <td>
                            <div class="form-group">

                              <select v-model="task.priority" class="form-control" name="select" id="select">
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                              </select>
                            </div>
                        </td>
                        <td  >

                            <button @click="store" class=" btn btn-primary btn-lg" type="submit">Add</button>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</template>
<script>
import TaskComponent from './TaskComponent';
export default {

    data() {
        return {
            tasks:[ ],
            task:{title:'',priority:''}

        }
    },
    components:{TaskComponent} ,
    methods: {
        getTasks(){
            window.axios.get('/api/tasks').then(({data})=>{

                data.forEach(task =>{
                    this.tasks.push(task)
                });
            });
        },
        store(){
            window.axios.post('api/tasks ', this.task).then(saveresult =>{
                    this.tasks.push(saveresult.data)
                    this.task.title = ""
                    this.task.priority = ""
            })
        },

        remove(id){

            window.axios.delete(`api/tasks/${id}`).then(()=>{
                let index = this.tasks.findIndex(task => task.id === id );
                if (this.tasks.splice(index,1)) {
                    alert("Item deleted")
                } else {
                    alert("error occured")
                }
            });
        }
    },
    created() {
        this.getTasks()
    },


}
</script>
<style lang="stylus" scoped>

</style>
