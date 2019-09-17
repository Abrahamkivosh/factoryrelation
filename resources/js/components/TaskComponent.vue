<template>

                    <tr>
                        <td scope="row">{{ task.id }}</td>
                        <td scope="row">{{ task.title }}</td>
                        <td>{{ task.priority }}</td>
                        <td  >
                            <button @click="remove" type= "button" class="btn btn-danger">
                                Delete
                            </button> </td>

                    </tr>



</template>
<script>
export default {


    data() {
        return {
        }
    },
    props:['task'] ,
    methods: {
        remove(){
            this.$emit("delete",this.task.id)  //it will broadcast this event with task id
        }
    },


}
</script>
<style lang="stylus" scoped>

</style>
