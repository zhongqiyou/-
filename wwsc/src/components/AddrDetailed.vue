<template>
    <div>
         <ul class="land_hander">
               <li><p class="land_hander_back" v-on:click="onUpper"></p></li>
               <li style="flex-grow: 1.2;">新建收货地址</li>
           </ul>
        <van-address-edit
        :area-list="areaList"
        show-postal
        show-set-default
        :area-columns-placeholder="['请选择', '请选择', '请选择']"
        @save="onSave"
            />
   </div>
</template>

<script>
import Vue from 'vue';
import { Dialog , Toast ,Area } from 'vant';
Vue.use(Dialog).use(Toast).use(Area);
import addr from "../json/addr.json";
export default {
    data() {
    return {
      areaList:addr ,
      user:"" , 
      leng:""
    }
  },

  methods: {
    onSave(save) {
      window.console.log(save);
      let saveDate = {
                  name:save.name,
                  tel:save.tel , 
                  address:save.province + save.city + save.county + save.addressDetail , 
                  code:save.postalCode , 
                  addrbool:save.isDefault , 
                  user:this.user , 
                  addressDetail:save.addressDetail , 
                  areaCode:save.areaCode , 
                  city:save.city ,
                  county:save.county , 
                  postalCode:save.postalCode , 
                  province:save.province ,
                  isDefault:save.isDefault
       }
      
       if(save.isDefault){
         this.onUpdate(save.isDefault);
       }
       setTimeout(()=>{
       this.onInsert(saveDate);
       } , 1000)
      

    },
    onUpper(){
            this.$router.go(-1);
        } ,
    onInsert(data){
         this.axios.get('/wwsc/addr/insert.php' , {
                 params:data
                })    
                    .then((res)=>{
                      window.console.log(res);
                    if(res.data == "新增成功"){
                            Toast.success(res.data);
                               setTimeout(()=>{
                               this.$router.go(-1);
                              } , 2000);
                    }
             })
    } , 
     onSelectUser(){
              this.axios.get('/wwsc/user/select.php')    
              .then((res)=>{
                this.user = res.data;
                window.console.log(this.user);
            });
         } , 
      onUpdate(data){
         this.axios.get('/wwsc/addr/update_default.php' , {
           params:{
             user:this.user , 
             isDefault:!data
           }
         })    
              .then((res)=>{
                window.console.log(res);
            });
      } , 
      onLength(){
         this.axios.get('/wwsc/addr/length.php' , {
           params:{
             user:this.user
           }
         })    
              .then((res)=>{
               this.leng= res.data
            });
      }
  } , 
  created() {
  this.onSelectUser();
   this.onLength();
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