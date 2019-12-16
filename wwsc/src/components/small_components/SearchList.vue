<template>
         <div class="hander_search">
                 <ul class="search">
                 
                    <li style="line-height:0.65rem;" v-on:click="onUpper">
                         <img src="../../../public/static/icon/returnw.png" width="50%" alt="">
                    </li>
                  
                   
                   <router-link to="/searchReally" style="width:100%">
                    <li class="search_li" style="">
                        <img src="../../../public/static/icon/search.png" width="12%" alt="">
                         <p>{{title_input ? title_input : $route.query.text}}</p>
                    </li>
                     </router-link>

                     <router-link to="/searchReally"  class="router_width">
                    <li style="line-height:0.5rem; width:100%;">搜索</li>
                    </router-link>
                 </ul>
            
         </div>
</template>


<script>
export default {
    props:{
       title_input:String
    } , 
    methods: {
        onUpper(){
          this.$router.go(-1);
        }
    },
   
   
}
</script>

<style scoped>
.router_width{
    width: 20%;
}
.search{
    display: flex;
    height: 0.5rem;
    width: 100%;
 background-image: url("../../../public/static/back.jpg");
}
.search li{
    width: 20%;
    height: 100%;
    font-size: 0.16rem;
    text-align: center;
    color: #eeeeee;
}

.hander_search{
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
}
.search_li{
    border:1px solid #ccc;
    width:100% !important;
    background:#eeeeee;
    height:60% !important;
    margin-top:0.1rem;
    border-radius:5px;
    text-align:left !important;
    display: flex;
  
}
.search_li>p{
  color: #cccccc;
  margin: 0;
  line-height: 0.32rem;
}

</style>