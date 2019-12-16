<template>
    <div style="background:#eeeeee;height:6.7rem;">
       <ul class="land_hander">
               <li><p class="land_hander_back" v-on:click="onUpper"></p></li>
               <li style="flex-grow: 1.2;">账户设置</li>
       </ul>
        
        <ul class="code">
              <li>
                 <img src="../../public/static/icon/user.jpg" width="30%" style="border-radius: 0.4rem;line-height:0;" alt="">
                 <span style="vertical-align: 0.23rem;margin-left:10px;">{{this.$route.query.user}}</span>
              </li>
              <li style="text-align:right; line-height:0.68rem;">
                 <img src="../../public/static/icon/arrow.png" width="15%" style="" alt="">
              </li>
        </ul>

        <ul class="main">
             <li>
                <p style="line-height:0.32rem;">会员码</p>
                <p style="text-align:right;">
                     <img src="../../public/static/icon/personal_code.png" v-on:click="onMenber" width="15%" alt="">
                      <img src="../../public/static/icon/arrow.png"  width="15%"  alt="">
                       <van-overlay :show="show" v-on:click="show=false">
                        <div class="wrapper" >
                        <div class="block" @click.stop>
                          <img src="../../public/static/icon/menber_code.png" alt="">
                          <p style="color:#000;margin:0 auto;">{{this.$route.query.user}}的会员</p>
                        </div>
                        </div>
                    </van-overlay>
                </p>
             </li>
             <li>
                 <p style="line-height:0.32rem;">我的信息</p>
                 <p style="text-align:right;line-height:0.32rem;">
                       <span>添加汽车/宝宝等信息</span>
                       <img src="../../public/static/icon/arrow.png" style="    vertical-align: middle;" width="15%"  alt="">
                </p>
             </li>
             <li>
                   <p style="line-height:0.32rem;">地址管理</p>
                 <p style="text-align:right;line-height:0.32rem;" v-on:click="onAddr">
                       <span>新增/修改地址</span>
                       <img src="../../public/static/icon/arrow.png" style="    vertical-align: middle;" width="15%"  alt="">
                </p>
             </li>
        </ul>

           <ul class="main">
             <li>
                 <p style="line-height:0.32rem;">账户安全</p>
                 <p style="text-align:right;line-height:0.32rem;" v-on:click="onPasswordChange">
                       <span>修改密码/修改手机</span>
                       <img src="../../public/static/icon/arrow.png" style="vertical-align: middle;" width="15%"  alt="">
                </p>
             </li>
             <li>
                   <p style="line-height:0.32rem;">增票资质</p>
                 <p style="text-align:right;line-height:0.32rem;">
                       <span>个人增票认证</span>
                       <img src="../../public/static/icon/arrow.png" style="    vertical-align: middle;" width="15%"  alt="">
                </p>
             </li>
              <li>
                   <p style="line-height:0.32rem;">关联账号</p>
                 <p style="text-align:right;line-height:0.32rem;">
                       <span>微信等</span>
                       <img src="../../public/static/icon/arrow.png" style="    vertical-align: middle;" width="15%"  alt="">
                </p>
             </li>
        </ul>
 
        <button class="sign_out" v-on:click="onExit">退出登录</button>

    </div>
</template>


<script>
import Vue from 'vue';
import { Dialog , Toast} from 'vant';
Vue.use(Dialog).use(Toast); 
export default {
    data() {
        return {
              show: false ,
        }
    },
     methods: {
         onUpper(){
             this.$router.go(-1)
         } , 
         onMenber(){
              this.show = true;
         }  , 
         onAddr(){
               this.$router.push({path:"/addr"})
         } , 
         onPasswordChange(){
             this.$router.push({path:"/reset"})
         } ,
          onExit(){
           Dialog.confirm({
            title: '退出当前账号？',
            message: '期待下次登录'
            }).then(() => {
                this.onDelete();
            })
         } ,
          onDelete(){
              this.axios.get('/wwsc/user/delete.php')    
              .then((res)=>{
               window.console.log(res.data);
                this.$router.go(-1)
            });
         } , 
     },
}
</script>



<style scoped>

.block {
  width:3rem;
  height: 3rem;
  background-color: #fff;
  text-align: center; 
  border-radius: 15px;
  padding: 25px 8px 8px 8px;
  
}
.block>img{
    margin-top: 8px;
}
.block>p{
    margin: 0;
}
.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}
.sign_out{
   background: #f60;
   color: #fff;
   font-size: 0.16rem;
   border: none;
   margin: 0;
   width: 90%;
   height: 0.45rem;
   display: block;
   margin: 0 auto;
   border-radius: 8px;
}
.main{
    background: #ffffff;
    margin: 10px 0;

}

.main li{
   display: flex;
    padding:15px;
}
.main li p{
    margin: 0;
    font-size: 0.15rem;
    width: 50%;
}
.main li p+p{
    color:#cccccc;
}
.code{
    height: 0.5rem;
    display: flex;
    background: #ffffff;
    padding: 15px;
}
.code li{
    font-size: 0.16rem;
    width: 50%;
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