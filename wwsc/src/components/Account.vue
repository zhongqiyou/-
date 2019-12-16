<template>
    <div> 
        <van-search
            v-model="value"
            placeholder="请输入搜索关键词"
            show-action
            shape="round"
            @search="onSearch"
            >
            <div slot="label" class="search_left" v-on:click="onUpper"></div>
            <div slot="action" @click="onSearch">搜索</div>
            </van-search>


            <van-swipe-cell v-for="(item, index) in list" :key="index">
            <van-cell :border="false" :title="'用户：'+item.username" :value="item.password+'密码'" />
            <template slot="right">
                <van-button square type="primary" v-on:click="onEdit(item.username)" text="编辑"/>
                <van-button square type="danger" v-on:click="onDel(item.username)" text="删除"/>
            </template>
            </van-swipe-cell>
    </div>
</template>

<script>
import Vue from 'vue';
import { Dialog , Toast} from 'vant';
Vue.use(Dialog).use(Toast); 
export default {
    data() {
        return {
            value:"" ,
            list:[]
        }
    },
    methods: {
        onEdit(user){
             this.$router.push({path:"/useredit" , query:{username:user}});
             window.console.log(user);
        } , 
        onDel(user){
          this.onDelete(user);
        } ,
         onSearch(){
          this.onKey();
         } ,
           onUpper(){
            this.$router.go(-1)
          } , 
    onSelect(){
        this.axios.get('/wwsc/user/select_account.php')
                .then((res)=>{
                    this.list = res.data;
                    })
                } , 
    onKey(){
         this.axios.get('/wwsc/user/search.php' , {
             params:{
                 keyword:this.value
             }
         })
        .then((res)=>{
                     this.list = res.data;
                    })
                } , 

     onDelete(user){
          this.axios.get('/wwsc/user/delete_account.php' , {
             params:{
                 username:user
             }
         })
        .then((res)=>{
                    Toast.success(res.data);
                    this.onSelect();
             })
     }
    },
created() {
      this.onSelect()  
},

}
</script>

<style scoped>
.search_left{
    width: 100%;
    height: 0.36rem;
}

</style>
<style>
.van-swipe-cell__right{
    font-size: 0 
}
</style>