<template>
         <div>
             <Search></Search>
             <div style="margin-bottom:0.5rem;">
<van-tree-select
style="margin:0.5rem 0;"
  height="150vw"
  :items="items"
  :main-active-index.sync="activeIndex"
>
  <template slot="content">
          <div v-for="(value , index) in popular_json" :key="index">
             <div v-if="activeIndex == index" style="margin:0.12rem;">
                   <strong>{{value.title}}</strong>
                   <ul class="list">
                      <li  v-for="(value , index) in value.popular" :key="index" v-on:click="onTitle(value.text)">
                         
                           <img :src="value.src" alt="">
                           <p>{{value.text}}</p>
                         
                      </li>
                   </ul>
             </div>
            </div>
  </template>
</van-tree-select>
             </div>
             <NavFooter></NavFooter>
         </div>
</template>


<script>
import Search from "./small_components/Search"
import NavFooter from "./NavFooter";


export default {
    data() {
    return {
      activeIndex: 0,
      items: [
          { text: '热门推荐' },
          { text: '手机数码' },
          { text: '家用电器' },
          { text: '电脑办公' },
          { text: '计生情趣' },
          { text: '美妆护肤' },
          { text: '个户清洁' },
          { text: '汽车生活' },
          { text: '男装' },
          { text: '男鞋' },
          { text: '女装' },
          { text: '女鞋' },
          { text: '母婴童装' },
          { text: '图书音像' },
          { text: '户外运动' },
          ] , 
        
       popular_json:[
             {
               title:"热门分类" ,
               popular:[
                {src:"../static/list/popular1/one.png" , text:"手机"} , 
                {src:"../static/list/popular1/two.png" , text:"耳机"} , 
                {src:"../static/list/popular1/three.png" , text:"华为"} , 
                {src:"../static/list/popular1/four.png" , text:"电饭煲"} , 
                {src:"../static/list/popular1/five.png" , text:"电磁炉"} , 
                {src:"../static/list/popular1/six.png" , text:"路由器"} , 
                {src:"../static/list/popular1/seven.png" , text:"避孕套"} , 
                {src:"../static/list/popular1/eight.png" , text:"口红"} , 
                {src:"../static/list/popular1/nine.png" , text:"电吹风"} , 
                {src:"../static/list/popular1/ten.png" , text:"三只松鼠"} , 
                {src:"../static/list/popular1/eleven.png" , text:"洗衣液"} , 
                {src:"../static/list/popular1/twelve.png" , text:"保温瓶"} , 
                {src:"../static/list/popular1/thirteen.png" , text:"微波炉"} , 
                {src:"../static/list/popular1/fourteen.png" , text:"洗发水"} , 
                {src:"../static/list/popular1/fifteen.png" , text:"卫生纸"}
              ]
             } , 
              {
               title:"手机数码" ,
               popular:[
                {src:"../static/list/phone2/one.jpg" , text:"老人机"} , 
                {src:"../static/list/phone2/two.jpg" , text:"手机"} , 
                {src:"../static/list/phone2/three.jpg" , text:"全面手机"} , 
                {src:"../static/list/phone2/four.jpg" , text:"游戏手机"} , 
                {src:"../static/list/phone2/five.jpg" , text:"拍照手机"} , 
                {src:"../static/list/phone2/six.jpg" , text:"对讲机"} , 
                {src:"../static/list/phone2/seven.jpg" , text:"苏宁回收"} , 
                {src:"../static/list/phone2/eight.jpg" , text:"女性手机"} , 
                {src:"../static/list/phone2/nine.jpg" , text:"苏宁维修"} 
              ]
             } , 
              {
               title:"家用电器" ,
               popular:[
                {src:"../static/list/household3/one.jpg" , text:"电水壶"} , 
                {src:"../static/list/household3/two.jpg" , text:"电压力锅"} , 
                {src:"../static/list/household3/three.jpg" , text:"电饭煲"} , 
                {src:"../static/list/household3/four.jpg" , text:"电磁炉"} , 
                {src:"../static/list/household3/five.jpg" , text:"微波炉"} , 
                {src:"../static/list/household3/six.jpg" , text:"电饼铛"} , 
                {src:"../static/list/household3/seven.jpg" , text:"豆浆机"} , 
                {src:"../static/list/household3/eight.jpg" , text:"多用途锅"} , 
                {src:"../static/list/household3/nine.jpg" , text:"料理机"} , 
                {src:"../static/list/household3/ten.jpg" , text:"榨汁机"} , 
                {src:"../static/list/household3/eleven.jpg" , text:"电烤箱"} , 
                {src:"../static/list/household3/twelve.jpg" , text:"养生壶"} , 
                {src:"../static/list/household3/thirteen.jpg" , text:"电炖锅"} , 
                {src:"../static/list/household3/fourteen.jpg" , text:"电烧烤箱"} , 
                {src:"../static/list/household3/fifteen.jpg" , text:"面包机"} ,
                 {src:"../static/list/household3/sixteen.jpg" , text:"咖啡机"} , 
                {src:"../static/list/household3/seventeen.jpg" , text:"煮蛋器"} , 
                {src:"../static/list/household3/eighteen.jpg" , text:"电热饭盒"} , 
                {src:"../static/list/household3/nineteen.jpg" , text:"面条机"} , 
                {src:"../static/list/household3/twenty.jpg" , text:"酸奶机"} ,
                {src:"../static/list/household3/Twenty-one.jpg" , text:"空气炸锅"} , 
                {src:"../static/list/household3/Twenty-two.jpg" , text:"蔬菜解毒机"} 
              ]
             } , 
              {
               title:"电脑办公" ,
               popular:[
                {src:"../static/list/computer4/one.png" , text:"轻薄本"} , 
                {src:"../static/list/computer4/two.jpg" , text:"游戏本"} , 
                {src:"../static/list/computer4/three.jpg" , text:"机械键盘"} , 
                {src:"../static/list/computer4/four.jpg" , text:"组装电脑"} , 
                {src:"../static/list/computer4/five.jpg" , text:"移动硬盘"} , 
                {src:"../static/list/computer4/six.jpg" , text:"显卡"} , 
                {src:"../static/list/computer4/seven.jpg" , text:"游戏台式机"} , 
                {src:"../static/list/computer4/eight.jpg" , text:"家用打印机"} , 
                {src:"../static/list/computer4/nine.jpg" , text:"吃鸡装备"} , 
                {src:"../static/list/computer4/ten.jpg" , text:"曲屏显示器"} , 
                {src:"../static/list/computer4/eleven.jpg" , text:"投影机"} , 
                {src:"../static/list/computer4/twelve.jpg" , text:"日本文具"} 
              ]
             } , 
              {
               title:"计生情趣" ,
               popular:[
                {src:"../static/list/taste5/one.jpg" , text:"持久"} , 
                {src:"../static/list/taste5/two.jpg" , text:"螺纹"} , 
                {src:"../static/list/taste5/three.jpg" , text:"小号"} , 
                {src:"../static/list/taste5/four.jpg" , text:"大颗粒"} , 
                {src:"../static/list/taste5/five.jpg" , text:"超薄"} , 
                {src:"../static/list/taste5/six.jpg" , text:"果味"} 
              ]
             } , 
              {
               title:"美妆护肤" ,
               popular:[
                {src:"../static/list/care6/one.jpg" , text:"护肤礼盒"} , 
                {src:"../static/list/care6/two.jpg" , text:"深层清洁"} , 
                {src:"../static/list/care6/three.jpg" , text:"敏感肌"} , 
                {src:"../static/list/care6/four.jpg" , text:"卸妆"} , 
                {src:"../static/list/care6/five.jpg" , text:"界面"} , 
                {src:"../static/list/care6/six.jpg" , text:"爽肤水"} , 
                {src:"../static/list/care6/seven.jpg" , text:"面霜"} , 
                {src:"../static/list/care6/eight.jpg" , text:"肌底液"} , 
                {src:"../static/list/care6/nine.jpg" , text:"眼霜"} , 
                {src:"../static/list/care6/ten.jpg" , text:"睡眠面膜"} , 
                {src:"../static/list/care6/eleven.jpg" , text:"面膜"} , 
                {src:"../static/list/care6/twelve.jpg" , text:"唇膜"} , 
                {src:"../static/list/care6/thirteen.jpg" , text:"润唇膏"} , 
                {src:"../static/list/care6/fourteen.jpg" , text:"眼膜"} , 
                {src:"../static/list/care6/fifteen.png" , text:"喷雾"} ,
                 {src:"../static/list/care6/sixteen.jpg" , text:"护肤套装"} , 
                {src:"../static/list/care6/seventeen.jpg" , text:"T区护理"}
              ]
             } , 
              {
               title:"个户清洁" ,
               popular:[
                {src:"../static/list/clean_seven7/one.jpg" , text:"个人馆"} , 
                {src:"../static/list/clean_seven7/two.jpg" , text:"清洁馆"} , 
                {src:"../static/list/clean_seven7/three.jpg" , text:"进口清洁"} , 
                {src:"../static/list/clean_seven7/four.jpg" , text:"卫生棉条"} , 
                {src:"../static/list/clean_seven7/five.jpg" , text:"湿厕纸"} , 
                {src:"../static/list/clean_seven7/six.jpg" , text:"止汗露"} , 
                {src:"../static/list/clean_seven7/seven.jpg" , text:"花露水"} , 
                {src:"../static/list/clean_seven7/eight.jpg" , text:"驱蚊用品"} , 
                {src:"../static/list/clean_seven7/nine.jpg" , text:"本色纸"} , 
                {src:"../static/list/clean_seven7/ten.jpg" , text:"免洗洗手液"} 
              ]
             } , 
              {
               title:"汽车生活" ,
               popular:[
                {src:"../static/list/automobile8/one.jpg" , text:"机油"} , 
                {src:"../static/list/automobile8/two.jpg" , text:"汽车坐垫"} , 
                {src:"../static/list/automobile8/three.jpg" , text:"洗车水枪"} , 
                {src:"../static/list/automobile8/four.jpg" , text:"行车记录仪"} , 
                {src:"../static/list/automobile8/five.jpg" , text:"轮胎"} , 
                {src:"../static/list/automobile8/six.png" , text:"应急救援"} 
              ]
             } , 
              {
               title:"男装" ,
               popular:[
                {src:"../static/list/male9/one.jpg" , text:"夹克"} , 
                {src:"../static/list/male9/two.jpg" , text:"T桖"} , 
                {src:"../static/list/male9/three.jpg" , text:"针织衫"} , 
                {src:"../static/list/male9/four.jpg" , text:"衬衫"} , 
                {src:"../static/list/male9/five.jpg" , text:"卫衣"} , 
                {src:"../static/list/male9/six.jpg" , text:"风衣"} , 
                {src:"../static/list/male9/seven.jpg" , text:"牛仔裤"} , 
                {src:"../static/list/male9/eight.jpg" , text:"休闲裤"} , 
                {src:"../static/list/male9/nine.jpg" , text:"自营男装"}
              ]
             } , 
              {
               title:"男鞋" ,
               popular:[
                {src:"../static/list/shoes_eight10/one.jpg" , text:"休闲鞋"} , 
                {src:"../static/list/shoes_eight10/two.jpg" , text:"皮鞋"} , 
                {src:"../static/list/shoes_eight10/three.jpg" , text:"男靴"} , 
                {src:"../static/list/shoes_eight10/four.jpg" , text:"帆布鞋"} , 
                {src:"../static/list/shoes_eight10/five.jpg" , text:"板鞋"} , 
                {src:"../static/list/shoes_eight10/six.jpg" , text:"自营鞋靴"} , 
                {src:"../static/list/shoes_eight10/seven.jpg" , text:"新品推荐"}
              ]
             } , 
              {
               title:"女装" ,
               popular:[
                {src:"../static/list/female_nine11/one.jpg" , text:"早春新品"} , 
                {src:"../static/list/female_nine11/two.jpg" , text:"连衣裙"} , 
                {src:"../static/list/female_nine11/three.jpg" , text:"衬衫"} , 
                {src:"../static/list/female_nine11/four.jpg" , text:"T恤"} , 
                {src:"../static/list/female_nine11/five.jpg" , text:"牛仔裤"} , 
                {src:"../static/list/female_nine11/six.jpg" , text:"卫衣"} , 
                {src:"../static/list/female_nine11/seven.jpg" , text:"针织衫"} , 
                {src:"../static/list/female_nine11/eight.jpg" , text:"牛仔外套"} , 
                {src:"../static/list/female_nine11/nine.jpg" , text:"滋阴女装"} 
              ]
             } , 
              {
               title:"女鞋" ,
               popular:[
               {src:"../static/list/fe_shoes_nine12/one.jpg" , text:"休闲鞋"} , 
                {src:"../static/list/fe_shoes_nine12/two.jpg" , text:"中跟单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/three.jpg" , text:"大码女鞋"} , 
                {src:"../static/list/fe_shoes_nine12/four.jpg" , text:"深口单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/five.jpg" , text:"粗更单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/six.jpg" , text:"妈妈鞋"} , 
                {src:"../static/list/fe_shoes_nine12/seven.jpg" , text:"婚鞋"} , 
                {src:"../static/list/fe_shoes_nine12/eight.jpg" , text:"通勤OL"} , 
                {src:"../static/list/fe_shoes_nine12/nine.jpg" , text:"凉鞋"} , 
                {src:"../static/list/fe_shoes_nine12/ten.jpg" , text:"高跟单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/eleven.jpg" , text:"尖头单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/twelve.jpg" , text:"单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/thirteen.jpg" , text:"平底单鞋"} , 
                {src:"../static/list/fe_shoes_nine12/fourteen.jpg" , text:"帆布鞋"} , 
                {src:"../static/list/fe_shoes_nine12/fifteen.jpg" , text:"小白鞋"} ,
                 {src:"../static/list/fe_shoes_nine12/sixteen.jpg" , text:"玛丽珍"} , 
                {src:"../static/list/fe_shoes_nine12/seventeen.jpg" , text:"豆豆鞋"} , 
                {src:"../static/list/fe_shoes_nine12/eighteen.jpg" , text:"鞋靴"} , 
                {src:"../static/list/fe_shoes_nine12/nineteen.jpg" , text:"绣花鞋"} , 
                {src:"../static/list/fe_shoes_nine12/twenty.jpg" , text:"人字拖"} ,
                {src:"../static/list/fe_shoes_nine12/Twenty-one.jpg" , text:"内增高"} , 
                {src:"../static/list/fe_shoes_nine12/Twenty-two.jpg" , text:"雨鞋"} ,
                {src:"../static/list/fe_shoes_nine12/Twenty-three.jpg" , text:"鞋配件"} , 
                {src:"../static/list/fe_shoes_nine12/Twenty-four.jpg" , text:"袜靴"} 
              ]
             } , 
              {
               title:"母婴童装" ,
               popular:[
                {src:"../static/list/baby13/one.jpg" , text:"1段"} , 
                {src:"../static/list/baby13/two.jpg" , text:"2段"} , 
                {src:"../static/list/baby13/three.jpg" , text:"3段"} , 
                {src:"../static/list/baby13/four.jpg" , text:"4段"} , 
                {src:"../static/list/baby13/five.jpg" , text:"孕妈奶粉"} , 
                {src:"../static/list/baby13/six.jpg" , text:"特殊配方奶粉"} , 
                {src:"../static/list/baby13/seven.jpg" , text:"有机奶粉"} 
              ]
             } ,
              {
               title:"图书音像" ,
               popular:[
                {src:"../static/list/books14/one.jpg" , text:"文字"} , 
                {src:"../static/list/books14/two.jpg" , text:"童书"} , 
                {src:"../static/list/books14/three.jpg" , text:"教材辅导"} , 
                {src:"../static/list/books14/four.jpg" , text:"人文社科"} , 
                {src:"../static/list/books14/five.jpg" , text:"经管励志"} , 
                {src:"../static/list/books14/six.png" , text:"艺术"} , 
                {src:"../static/list/books14/seven.jpg" , text:"IT科技"} , 
                {src:"../static/list/books14/eight.png" , text:"文娱"} , 
                {src:"../static/list/books14/nine.jpg" , text:"教育培训"} , 
                {src:"../static/list/books14/ten.png" , text:"生活"} , 
                {src:"../static/list/books14/eleven.jpg" , text:"电子书"} , 
                {src:"../static/list/books14/twelve.jpg" , text:"知识服务"}
              ]
             } ,
              {
               title:"户外运动" ,
               popular:[
                {src:"../static/list/motion15/one.jpg" , text:"跑步鞋"} , 
                {src:"../static/list/motion15/two.jpg" , text:"体育用品"} , 
                {src:"../static/list/motion15/three.jpg" , text:"鱼竿鱼线"} , 
                {src:"../static/list/motion15/four.jpg" , text:"山地车"} , 
                {src:"../static/list/motion15/five.jpg" , text:"篮球鞋"} , 
                {src:"../static/list/motion15/six.jpg" , text:"跑步机"} , 
                {src:"../static/list/motion15/seven.jpg" , text:"足球鞋"} , 
                {src:"../static/list/motion15/eight.jpg" , text:"冲锋衣裤"}
              ]
             } 


               
                 
       ] , 

      
    }
  } , 
  components:{
      Search ,
      NavFooter
  } , 
  methods: {
    onTitle(value){
     this.$router.push({path:'/commodity',query: {text:value}})
    }
  },
}
</script>

<style scoped>
.list{
    display: flex;
    width: 100%;
    flex-wrap: wrap;
}

.list li{
     width: 33%;
     text-align: center;
     margin: 10px 0;
}
.list li img{
     width: 80%;
}
.list li p{
  margin: 0;
  font-size: 0.10rem;
}
.van-tree-select__content{
  flex: 3;
}
</style>



