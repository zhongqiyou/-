<template>
    <div>
      <ul class="land_hander">
               <li><p class="land_hander_back" v-on:click="onUpper"></p></li>
               <li style="flex-grow: 1.2;">收货地址</li>
           </ul>
        <van-address-list
        :default-tag-text="user"
        v-model="chosenAddressId"
        :list="list"
        @add="onAdd"
        @edit="onEdit"
        @select="onAddrChange"
        />

 </div>
</template>
  

<script>
import Vue from 'vue';
import { Dialog , Toast} from 'vant';
Vue.use(Dialog).use(Toast); 
  export default {
        data() {
    return {
      user:"" ,
      chosenAddressId:"1",
      list:[] 
    }
  },

  methods: {
    onAdd() {
      this.$router.push({path:"/addrdetailed"});
    },

    onEdit(item, index) {
      let data = {
      id:item.id ,
      user:item.user 
      }
       this.$router.push({path:"/edit" , query:data});
      window.console.log(index);
    } ,
  
     onUpper(){
            this.$router.go(-1);
        } ,
      onSelectUser(){
              this.axios.get('/wwsc/user/select.php')    
              .then((res)=>{
                this.user = res.data;
                window.console.log(this.user);
            });
        } , 
      onSelect(){
         this.axios.get('/wwsc/addr/select.php', {
           params:{
             user:this.user
           }
         })    
              .then((res)=>{
                window.console.log(this.list = res.data);
            });
      } ,
      onAddrChange(data){
          if(this.$route.query.cart_commodity){
      let addrData = {
                 name:data.name ,
                 tel:data.tel ,
                 address:data.address , 
                 cart_commodity:this.$route.query.cart_commodity , 
                 user:this.$route.query.user , 
                 total:this.$route.query.total
            }
              this.$router.push({name:'confirm',query: addrData});
          }
            
      }
  } , 
  created() {
     this.onSelectUser();
     setTimeout(()=>{
       this.onSelect();
     } , 1000)
  },
  }
  </script>

  <style scoped>
  .land_hander{
    display: flex;
    padding: 5px;
    background: -webkit-gradient(linear, left top, right top, from(#eb3c3c), to(#ff7459));
    color: #fff;
}
.land_hander li{
    height: 0.36rem;
    flex-grow: 1;
    font-size: 0.16rem;
    line-height: 0.36rem;
}
.land_hander_back{
    width: 0.30rem;
    height: 0.36rem;
    background-image:url("../../public/static/icon/returnw.png");
    background-size: 100%;
    background-repeat:no-repeat; 
    background-position: 0px 5px;
    margin: 0;
}
  </style>