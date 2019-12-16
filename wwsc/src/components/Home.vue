<template>
         <div>
           <Search></Search>
             <div class="header" v-if="true">
              <van-swipe :autoplay="3000" indicator-color="white"  class="swiper_item">
                 <van-swipe-item v-for="(image, index) in images" :key="index">
                    <img :src="image"  width="100%" height="100%"/>
              </van-swipe-item>
                    </van-swipe>

                <div class="nav_number">
                     <ul>
                         <li v-for="(image , index) in nav_images" :key="index">
                             <img :src="image.img" width="55%" height="55%">
                             <p>{{image.img_text}}</p>
                         </li>
                     </ul>
                </div>

                <div class="title_text">    
                    <img src="../../public/static/title_left.gif" width="30%"  height="100%" alt="">
                      <img src="../../public/static/title_center.gif" width="40%" height="100%" alt="">
                        <img src="../../public/static/title_right.gif" width="30%" height="100%" alt="">
                </div>

                <div class="title_goods">
                     <ul>
                         <li style="position:relative;">
                         
                            <strong style="margin-right:5px; color:#000000; font-size:0.14rem;">限时抢购</strong>
                             <van-count-down :time="time" class="title_date">
                               <template v-slot="timeData">
                                <span class="item">{{ timeData.hours }}</span><span style="color:red;">:</span>
                                <span class="item">{{ timeData.minutes }}</span><span style="color:red;">:</span>
                                <span class="item">{{ timeData.seconds }}</span>
                            </template>
                            </van-count-down>
                            
                            <p class="title_h2">潮流好物限时抢</p>
                             <div class="title_img">
                                 <div>
                                      <img src="../../public/static/title_one.jpg" width="85%" height="85%" alt="">
                                      <p  style="color:red;">￥99</p>
                                 </div>
                                 <div>
                                     <img src="../../public/static/title_two.jpg" width="85%" height="85%" alt="">
                                      <p  style="color:red;">￥99.9</p>
                                 </div>
                             </div>
                         </li>
                         <li v-for="(image , index) in title_images4" :key="index">
                              <strong style="margin-right:5px; color:#000000;font-size:0.14rem;">{{image.title}}</strong>
                               <p  class="title_h2">{{image.text}}</p>
                               <div class="title_img">
                                 <div>
                                      <img :src="image.img1" width="85%" height="85%" alt="">
                                      <p>{{image.text_img1}}</p>
                                 </div>
                                 <div>
                                     <img :src="image.img2" width="85%" height="85%" alt="">
                                      <p>{{image.text_img2}}</p>
                                 </div>
                             </div>
                         </li>
                         
                     </ul>

                        <div class="title_main">
                             <div class="title_main_one">
                                 <h6>为你推荐</h6>
                                 <p>精选频道</p>
                             </div>
                             <div v-for="(image , index) in title_images" :key="index">
                                 <img :src="image.img" width="60%" height="60%" alt="" >
                                  <p>{{image.img_text}}</p>
                             </div>
                             
                        </div>  
                        
                         <div class="css3_wheel">
                         <img src="../../public/static/css3_left.png" alt="" width="30%" height="100%" class="title_text_img">
                         <ol>
                            <li v-for="(text , index) in title_text" :key="index"> 
                                <span>热门</span>
                                {{text}}
                            </li>
                         </ol>
                        </div>
                   </div>


                  <div class="title2">
                      <div>
                          <ul>
                              <li><img src="../../public/static/title_end_one.webp" width="100%" alt=""></li>
                              <li><img src="../../public/static/title_end_two.webp" width="100%" alt=""></li>
                              <li><img src="../../public/static/title_end_three.webp" width="100%" alt=""></li>
                               <li><img src="../../public/static/title_end_one.webp" width="100%" alt=""></li>
                          </ul> 
                      </div>
                      <img src="../../public/static/title2.gif" width="100%" alt="">
                   </div>

    
                    <div class="title_list">
                      <h1><img src="../../public/static/title_list.png" width="100%" alt=""></h1>
                      <ul>
                          <li>
                              <img src="../../public/static/title_end_one.webp"  width="80%" alt="">
                              <p class="title_p">人气榜</p>
                              <p>时尚保鲜冰箱榜</p>
                              <p>卖爆3342件</p>
                          </li>
                         <li class="title_li2">
                              <img src="../../public/static/title_end_two.webp"  width="80%" alt="">
                              <p class="title_p" style=" color: #fb7f0a !important; border:1px solid  #fb7f0a !important;">人气榜</p>
                              <p>酸甜可口果脯榜</p>
                              <p>卖爆6927件</p>
                          </li> <li>
                              <img src="../../public/static/title_end_three.webp"  width="80%" alt="">
                              <p class="title_p">趋势榜</p>
                              <p>时尚保鲜冰箱榜</p>
                              <p>本周趋势上升54%</p>
                          </li>
                      </ul>
                 </div>
                  <div class="title_footer">
                      <img src="../../public/static/title_res.gif" width="100%" alt="">
                 <van-divider :style="{ color: '#ffffff', borderColor: '#ffffff' , fontWeight:'bold' , fontSize:'0.2rem' , lineHeight:'0.45rem'}"><i>猜你喜欢</i></van-divider></div>
                      
              <div style="margin:5px;">  
           <List></List>
               <van-divider :style="{ color: '#ffffff', borderColor: '#ffffff', padding: '0 16px' }">
                已经到底啦 , 再往上逛逛吧
                </van-divider>
              </div>
             </div>

           <div style="margin-bottom:50px;font-size:0.12rem;background:#eeeeee;padding-bottom:5px;">  
           </div>
           <NavFooter></NavFooter>
           <Top></Top>
           <Poster></Poster>
         </div>
</template>


<script>
import Search from "./small_components/Search"
import List from "./small_components/List"
import NavFooter from "./NavFooter";
import Top from '@/components/small_components/Top'
import Poster from '@/components/small_components/Poster'

export default {
    data() {
        return {
            images:["../static/swiper_one.jpg" ,
                    "../static/swiper_two.jpg" ,
                    "../static/swiper_three.jpg" ,
                    "../static/swiper_four.jpg" ] ,
            nav_images:[
                {img:"../static/nav_one.webp" , img_text:"限时抢购"} ,
                {img:"../static/nav_two.webp" , img_text:"苏宁超市"} ,
                {img:"../static/nav_three.webp" , img_text:"苏宁拼购"} ,
                {img:"../static/nav_four.webp" , img_text:"爆款手机"} ,
                {img:"../static/nav_five.webp" , img_text:"苏宁家电"} ,
                {img:"../static/nav_six.webp" , img_text:"兑换好物"} ,
                {img:"../static/nav_seven.webp" , img_text:"赚钱"} ,
                {img:"../static/nav_eight.webp" , img_text:"签到有礼"} ,
                {img:"../static/nav_nine.webp" , img_text:"领劵中心"} ,
                {img:"../static/nav_ten.webp" , img_text:"更多频道"} 
            ] ,
            title_images:[
                {img:"../static/title_main_one.webp" , img_text:"生活家电"} ,
                {img:"../static/title_main_two.webp" , img_text:"苏宁Outl..."} ,
                {img:"../static/title_main_three.webp" , img_text:"新品首发"} ,
                {img:"../static/title_main_four.webp" , img_text:"0元试用"} ,
            ] ,

            title_images4:[
                {title:"大聚惠" , text:"好货一元秒" , img1:"../static/title_three.webp" , text_img1:"清风" , img2:"../static/title_four.webp" , text_img2:"小米"} ,
                {title:"苏宁国际" , text:"精选全球好物" , img1:"../static/title_five.webp" , text_img1:"假一赔十" , img2:"..//static/title_six.webp" , text_img2:"每日抽奖"} ,
                {title:"苏宁拼购" , text:"2人拼更实惠 全场包邮" , img1:"..//static/title_seven.jpg" , text_img1:"2人拼14.99" , img2:"../static/title_eight.jpg" , text_img2:"2人拼72"} ,
            ] ,

            title_text:[
                "3M净水器1号抢购攻略！" ,
                "真香机OPPO K5凭实力抢占千元机市场" , 
                "酱香型白酒好在哪？看完你就明白了" , 
                "0点放大价？双十一遇到海尔空调就购了！" , 
                "音画智慧屏电视可成为你的贴身管家，让生活变得更便捷" ,
                "3M净水器1号抢购攻略！" 
            ] ,
            title_end:[
                {img:"../static/title_end_one.webp" , text1:"人气榜" , text2:"时尚保鲜冰箱榜" , text3:"买爆3342件"} ,
                {img:"../static/title_end_two.webp" , text1:"人气榜" , text2:"酸甜可口果脯榜" , text3:"卖爆6927件"} ,
                {img:"../static/title_end_three.webp" , text1:"趋势榜" , text2:"学习娱乐乐器榜" , text3:"本周趋势上升54%"} 
            ] ,
             time: 30 * 60 * 60 * 1000
                    }
          
    },
    methods: {
       
    },  
    components:{
        Search ,
        List ,
        NavFooter ,
        Top ,
        Poster
    } , 
    
    
}
</script>

<style scoped>
.header{
    margin-top:50px; 
        background-image: url("../../public/static/back.jpg");
            padding-bottom: 5px;
    }

.swiper_item{
    width: 100%;
    height: 1.5rem;
}
.nav_number ul{
    display: flex;
    flex-wrap: wrap;
    margin: 10px;
    margin-top: 20px;
}
.nav_number ul li{
    flex-grow: 1;
    font-size: 0.12rem;
    width: 20%;
    height: 50%;
    text-align: center;
}
.nav_number ul li p{
    color: #ffffff;
    margin-top: 5px;
}
.title_text{
    width: 100%;
    height: 1.2rem;
    }
.title_goods{
    margin: 12px;
    background: #fff;
    border-radius:15px;
    overflow: hidden;
    margin-bottom: 3px;
}
.title_goods ul{
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
       
}
.title_goods ul li{
        width: 50%;
        height: 1.5rem;
        font-size: 0.2rem;
        font-family: "宋体";
        box-shadow:0 -1px 1px #cccccc inset;  
}


.item {
  display: inline-block;
  width: 0.22rem;
  height: 0.15rem;
  color: #fff;
  font-size: 0.12rem;
  text-align: center;
  background-color: orange;
  line-height: none !important;
  
}
.title_date{
    position: absolute;
    top: 3%;
    right: 10%;
    line-height: 0.15rem;
}

.title_h2{
  margin: 2px 0;
  color: #777777;
 font-size: 0.12rem;
}
.title_img{
    width: 100%;
    display: flex;
}
.title_img div{
    width: 50%;
    flex-grow: 1;
    text-align: center;
}
.title_img div p{
    margin: 0 !important;
      font-size: 0.12rem !important;
      margin-top: 2px !important;
}

.title_main{
    display: flex;
    font-size:0.12rem; 
    padding: 10px;
    padding-top: 0;
    box-shadow:0 -1px 1px #cccccc inset;  
}
.title_main div{
    flex-grow: 1; 
    width:17.5%;
    height:100%;
    text-align: center;
  
}
.title_main p{
  font-size: 0.12rem;
  margin: 0;
  margin-top: 5px;
}
.title_main_one{
    flex-grow: 2;
    width:30%;
}
.title_main_one h6{
    margin: 0;
    font-size: 0.14rem;
    margin-top: 0.15rem;
    text-align: left;
}
.title_main_one p{
    font-size: 0.12rem;
     margin: 0;
     color: #777777;
     text-align: left;
}
.css3_wheel{
    display: flex;
    background: #e8e8e8;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 11px;
    padding-bottom: 5px;
    height: 0.2rem;
    overflow: hidden;
}
.css3_wheel ol{
   width: 100%;
   height: 1.8rem;
   font-size: 0.12rem;
    margin-left: 20px;
   animation-name: funtext;
    animation-duration: 8s;
   animation-iteration-count: infinite;
}
@keyframes funtext{
            0%{
                margin-top: 0;
            }
            20%{
                margin-top: -0.3rem;
            }
            40%{
                margin-top: -0.6rem;
            }
            60%{
               margin-top: -0.9rem;
            }
            80%{
               margin-top: -1.2rem;
            }
            90%,100%{
              margin-top: -1.5rem;
            }
}
.css3_wheel ol li{
   width: 70%;
   height: 0.3rem;
   overflow: hidden;
    text-overflow:ellipsis;
    white-space: nowrap;
}
.css3_wheel ol li span{
    background: orange;
    border-radius:10px; 
    padding: 0 0.05rem;
    display: inline-block;
    color:#fff;
}
.title_text_img{
    width: 0.8rem;
  margin-top:-0.03rem; 
}

.title_list{
    background: #eeeeee;
    margin: 10px;
    border-radius: 10px;
    padding-bottom:5px;
    padding-bottom:8px;
}
.title_list h1{
    margin: 0;
    line-height: 0;
    padding: 0;
    font-size: 0;
   
}
.title_list h1 img{
    line-height: 0 ;
    margin: 0;
    padding: 0;
    margin-top:10px; 
 
}
.title_list ul{
    display: flex;
    margin:0 1%;
    justify-content:space-between;

}
.title_list ul li{
    background: #ffffff;
    width: 30%;
    text-align: center;
    background-image:url("../../public/static/title_back.png"); 
    background-repeat:no-repeat;
    background-size: 100% 120%;
    background-position-y:1.25rem; 
    border: 1px solid #eeeeee;
    border-radius:15px;
    font-size: 0.9rem;
    padding-bottom: 3px;
}


.title_list ul li p{
    font-size: 0.12rem;
    margin: 0;
    color: #ffffff;
}
.title_p{
    width:50%;
    border:1px solid #d9a87a;
    border-radius:10px;
    background: #ffffff;
    color: #d9a87a !important;
    margin: 0 auto !important;
}
.title_li2{
       background-image:url("../../public/static/title_back2.png") !important; 
}
.title2{
    display: flex;
    position: relative;
}
.title2 div{
    position: absolute;
    width: 0.6rem;
    height:0.6rem;
    background: #d9a87a;
    top: 0.27rem;
    left: 0.37rem;
    overflow: hidden;
}
.title2 div ul{
    width: 2.4rem;
    display: flex;
    position: absolute;
    top: 0;
    font-size: 0;
     animation-name: funimg;
    animation-duration: 5s;
   animation-iteration-count: infinite;
}
@keyframes funimg{
    0%{
        left:0;
    }
    
    30%{
        left: -60px;
    }

    60%{
       left: -120px;
    }

    90% , 100%{
        left: -180px;
    }
}

.title2 div ul li{
    width: 0.60rem;
    border-radius: 0.3rem;
    overflow: hidden;
}
.title_footer{
display:flex;
position: relative;
padding-bottom:0.15rem;
}
.title_footer div{
    position: absolute;
    width: 100%;
    text-align: center;
    color:#fff;
    bottom: -0.15rem;
    
}
.title_footer div span{
    font-size: 0.20rem;
    font-weight: bold;
}












</style>