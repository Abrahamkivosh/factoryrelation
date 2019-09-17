<template>
    <div>
        <div class="col-lg-12">
            <div class=" scrollbox" >
                <div>
                    <li class="list-group-item active text-center text-capitalize">My chart Box</li>
                    <ul id="editscroll" class="list-group"  v-chat-scroll="{always: false, smooth: true, scrollonremoved:true}">

                        <li v-for="(message, index) in charts" :key="index"  :class="className"   class="list-group-item float-right w-100  ">
                                {{ message }}
                                <span class="badge badge-warning float-right">You</span>
                        </li>

                    </ul>
                </div>
            </div>
            <div>
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                    </div>
                    <input v-model="newmessage" @keyup.enter="sendMessage" type="text" name="message" class="form-control">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

    props:["color"],
    data() {
        return {
            newmessage:"",
            charts:[
                "message one",
                "two",
                "three"
            ]

        }
    },
    methods: {
        sendMessage(){

                if (this.newmessage.length > 1) {
                    this.charts.push(this.newmessage)
                }
        }
    },
    computed: {
        className(){
            return 'py-2 p-2pull-left float-right  list-group-item-'+this.color ;
        },

    },
    mounted() {
        this.sendMessage();

    },

}
</script>
<style>
#editscroll{
    overflow-y:scroll;
    height:200px ;


}

</style>
