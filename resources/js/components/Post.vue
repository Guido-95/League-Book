<template>

    <div class="single-post">
        <div class="row container-img-nick">
            <img class="img-post mr-4" :src="'http://127.0.0.1:8000/storage/' + post.img_owner" alt="">
            <div class="row flex-column">
                <h5 class="text-left">{{post.owner}}</h5>
                {{postdate}}   
            </div>
      
        </div>
        
        <h2 class="title">{{post.title}}</h2>
        <p class="content">{{post.content}}</p>
        
        <div class="text-center cover">
            
            <img class="img-fluid w-75" :src="'http://127.0.0.1:8000/storage/'+ post.cover" alt="">
            
        </div>
        
        <a :href="commenta"> commenta </a>

    

        <div v-for="commento in comments " :key="commento.id" class="commento">
            
            <div class="owner-name-img">
                <img class="img-owner" :src="'http://127.0.0.1:8000/storage/'+ commento.img_owner" alt="">
                {{commento.owner}}
            </div>
            <div class="text-created">
                <div class="text">
                    {{commento.content}}
                </div>
                <div class="created">
                 {{formatDate(commento.created_at)}}
                </div>
            </div>
            
        </div>
                
        
    
    
    </div>

</template>

<script>
import moment from "moment";
   export default {
       props:{
            post:Object,
            postdate:String,
            comments:Array,
            commenta:String
       },

       methods:{
             formatDate(date) {
            return moment(date).format("H:MM:SS - D MMMM ")
        },
       }
   }
</script>
<style lang='scss' scoped>

.single-post{
    margin: 10px auto;
    width: 70%;
    
    // border: 1px solid black;
    border-radius: 10px;
    border: 1px solid black;
    background-color: white;
    // background-color: yellowgreen;
}

.container-img-nick{
    margin: 10px;
}

.cover{
    width: 100%;
    // border: 1px solid black;
}

.img-post{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.img-profile{
    width: 75px;
    height: 75px;
    border-radius: 50%;
}
.no-img-profile{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.commento{
    margin: 10px;
    display: flex;
    flex-direction: column;
    // background-color: yellowgreen;
    border: 1px solid black;
    // background-color: rgb(123, 177, 17);
    padding: 10px;
    border-radius: 5px;
    .owner-name-img{
        font-weight: bold;

        margin-bottom: 10px;
        .img-owner{
          
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }
    }

    .text-created{
        position: relative;
        // background-color: aqua;
        display: flex;
        padding-left: 40px;
        flex-direction: column;
        justify-content: space-between;
        .text{
            padding: 10px;
            width: 80%;
            background-color: rgb(233, 231, 231);
            border-radius: 5px;
            font-size: 18px;
            
            // background-color: pink;
        }
        .created{
            // background-color: green;
            font-size: 10px;
            margin-top: 5px;
            align-self: flex-end;
        }
    }
}


</style>