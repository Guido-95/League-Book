<template>
    <!-- versione non utilizzata -->
  <div>
      <h1 class=" text-center">chat con {{user2.name}}</h1>
    <div class="container text-center">
        
        <div class="chat">
            <div class="messages" id="data">
                <div v-for="messaggio in messages" :key="messaggio.id"  class="container-messages">
                    <div v-if="messaggio.user1 == user1.id"  class="message1">
                        <div  class="single-message">
                        
                            <div class="text">
                            {{messaggio.message}}
                                <div class="date1">
                                    {{formatDate(messaggio.created_at)}}
                                </div>
                            </div>
                            <div class="name">
                                <img :src="'http://127.0.0.1:8000/storage/' + user1.img_profile" alt="">
                            
                            </div>
                            
                        </div>
                    </div>
                    <div v-else class="message2">
                        <div class="single-message">
                            <div class="name">
                                <img :src="'http://127.0.0.1:8000/storage/' + user2.img_profile" alt="">
                            </div>
                            <div class="text">
                                {{messaggio.message}}
                            </div>
                            
                            <div class="date2">
                                {{formatDate(messaggio.created_at)}}
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- messaggio amico -->
            </div>
            <div class="button-message">
                <form  action="">
                    <input hidden type="text" name='id' value=''>
                    <input type="text" v-model="form.singleMessage" name='message' autofocus>
                    <button class="btn btn-info" @click.prevent=invioMessaggio type="submit">invia</button>
                </form>
            </div>
            
        </div>
      
    </div>

  </div>
</template>

<script>
import axios from 'axios'
import moment from "moment";
export default {
    data(){
        return{
            messages:[],
            form:{
                singleMessage :'',
            },
         
            user1:[],
            user2:[]
        }
    },
    methods:{
        formatDate(date) {
            return moment(date).format("H:MM:SS - D MMMM ")
        },
        invioMessaggio(){
            axios.post('http://127.0.0.1:8000/api/invio?friend=' + this.$route.query.friend + '&user=' + this.$route.query.user,this.form)
            
            .then(res=>{
                console.log(res.data);
                this.form.singleMessage = ''
                axios.get('http://127.0.0.1:8000/api/messaggi?friend=' + this.$route.query.friend + '&user=' + this.$route.query.user)
                .then(res=>{
                    
                    this.messages = res.data.messaggi;
                    this.user1= res.data.user1;
                    this.user2= res.data.user2;
                    // console.log(this.messages,this.user1,this.user2);
                })
                .catch(err=>{
                    console.log(err);
                })
                    })
                    .catch(error=>{
                        console.log(error);
                    })
                }
    },
    
    updated: function () {
        this.$nextTick(function () {
            var element = document.getElementById('data');
            element.scrollTop = element.scrollHeight;
        })
    },
    created(){
        console.log(this.$route.query.friend);
        axios.get('http://127.0.0.1:8000/api/messaggi?friend=' + this.$route.query.friend + '&user=' + this.$route.query.user)
        .then(res=>{
            
            this.messages = res.data.messaggi;
            this.user1= res.data.user1;
            this.user2= res.data.user2;
            console.log(this.messages);
            // console.log(this.messages,this.user1,this.user2);
        })
        .catch(err=>{
            console.log(err);
        })
        // window.onload = function(){
        //     var elem = document.getElementById('data');
        //     elem.scrollTop = elem.scrollHeight;
        // }
          
    }
}
</script>

<style scoped lang='scss'>



</style>