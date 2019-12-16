<template>
    <div>
           <ul class="land_hander">
               <li><p class="land_hander_back" v-on:click="onUpper"></p></li>
               <li style="flex-grow:1.2;text-align:left;">用户编辑</li>
           </ul>
          
          <div style="margin-top:0.5rem;">
            <van-cell-group>
            <van-field v-model="username" disabled clearable type="text"   placeholder="请输入用户名"></van-field>
            <hr style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:0 10px;">
            <van-field v-model="password" type="text"  placeholder="请输入密码"></van-field>
            <hr style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:0 10px;">
            </van-cell-group>
          </div>

           <div style="margin:10px 15px;line-height:0;">
                 <van-button  type="primary" size="large" v-on:click="onLand">保 存</van-button>
           </div>
          

            
        
    </div>
</template>

<script>
import Vue from 'vue';
import { Dialog , Toast} from 'vant';
Vue.use(Dialog).use(Toast); 
export default {
    data() {
        return {
            username:"" , 
            password:"" 
        }
    },
    methods: {
        onLand(){ 
            this.onUpdate(this.$route.query.username);
        } ,
        onUpper(){
            this.$router.go(-1);
        } , 
        onSelect(user){
            this.axios.get('/wwsc/user/select_detailed.php' , {
                params:{
                    username:user
                }
            })
                .then((res)=>{
                    this.username = res.data[0].username;
                    this.password = res.data[0].password;
                    })
        } , 
         onUpdate(user) {
             this.axios.get('/wwsc/user/update_account.php' , {
                params:{
                    username:user , 
                    password:this.password
                }
            })
                .then((res)=>{
                  Toast.success(res.data);
                    setTimeout(()=>{
                             this.$router.go(-1);       
                              } , 2000)   
                    })
        },
    },
    created() {
        this.onSelect(this.$route.query.username);
    },
}
</script>

<style scoped>




.van-button--large{
    font-weight: bold;
    font-size: 0.2rem;
    background: #f56723;
    border: none;
    border-radius:8px;
}

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