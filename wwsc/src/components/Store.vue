<template>
    <div>
        <ul class="land_hander">
               <li><p class="land_hander_back" v-on:click="onUpper"></p></li>
               <li style="flex-grow: 1.2;">管理登陆</li>
           </ul>

           <!-- 密码输入框 -->
            <van-password-input
            :value="value"
            info="密码为 6 位数字"
            :error-info="error"
            :focused="showKeyboard"
            @focus="showKeyboard = true"
            />

            <!-- 数字键盘 -->
          <van-number-keyboard
            :show="showKeyboard"
            theme="custom"
            extra-key="."
            close-button-text="完成"
            @blur="showKeyboard = false"
            @input="onInput"
            @delete="onDelete"
            
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
             value: '',
             showKeyboard: true ,
             ran:"" , 
             error:""
        }
    },
     methods: {
        onUpper(){
            this.$router.go(-1);
        } ,
        onInput(key) {
        this.value = (this.value + key).slice(0, 6);
        
        if(this.value.length == 6){
         if(this.value == this.ran){
         Toast.success('通过验证');
              setTimeout(()=>{      
                this.$router.push({path:"/userstore"});
            } , 2000) 
       
        }else{
          this.error = "密码错误???"
        }
        }
       
           
       },
        onDelete() {
        this.value = this.value.slice(0, this.value.length - 1);
        }
     },
     created() {
         this.ran = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
         window.console.log();
         Dialog.alert({
                    title: '请查收管理验证码',
                    message:this.ran
                    })
     },

}
</script>


<style scoped>
.van-password-input__security{
    border: 1px solid #cccccc;
    border-radius: 8px;
    overflow: hidden;
}
.van-password-input{
    margin-top: 1.6rem;
}
.van-number-keyboard{
    font-size: 0.24rem;
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