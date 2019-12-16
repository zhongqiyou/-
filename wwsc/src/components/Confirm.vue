<template>
    <div style="background:#eeeeee;padding-bottom:0.1rem;">
         <ul class="land_hander">
               <li v-on:click="onUpper"><p class="land_hander_back"></p></li>
               <li style="flex-grow: 1.2;">确认订单</li>
           </ul>

          <ul class="confirm_position" v-on:click="onAddrChange">
              <li style=" width: 20%;text-align:center;"><img src="../../public/static/icon/position.png" width="80%" alt=""></li>
              <li style=" width: 80%;" v-for="(value , index) in addr" :key="index">
                <h3><span>{{value.name}}</span> <span>{{value.tel}}</span></h3> 
                <P style="width:80%;">{{value.address}}</P>
              </li>
              <li  style="line-height:0.8rem;"  v-if="default_swi">你还没有默认地址 ， 请设置地址</li>
          </ul>

            <div class="confirm_goods">
            <div v-for="(value , index) in list" :key="index">
               <van-card
                :num="value.number"
                :price="value.price"
                :desc="value.detailed"  
                :title="value.title"
                :thumb="value.src"
                class="confirm_raduis"
                />
            </div>
            
              <p style="margin:10px 10px 0 10px;">商家配送，支付完成后尽快为您发货</p>
            <div style="padding:0 10px;">
            <van-cell-group>   
            <van-field
                v-model="message"
                rows="2"
                autosize
                type="textarea"
                maxlength="50"
                placeholder="选填：给商家留言50字以内"
                show-word-limit
            />
            </van-cell-group>
            </div>

            <ul class="confirm_printing">
                <li>
                    <p style="color:#999999;">发票</p>
                    <p>纸质-钟启有</p>
                </li>
                <li>
                    <!-- <p style="color:#999999;">优惠券</p>
                    <p>节省<span style="color:#FF5500;">5.00</span>元</p> -->
                      <!-- 优惠券单元格 -->
                    <van-coupon-cell
                    :coupons="coupons"
                    :chosen-coupon="chosenCoupon"
                    @click="showList = true"
                    />

            <!-- 优惠券列表 -->
            <van-popup v-model="showList" position="bottom">
            <van-coupon-list
                :coupons="coupons"
                :chosen-coupon="chosenCoupon"
                :disabled-coupons="disabledCoupons"
                @change="onChange"
                @exchange="onExchange"
            />
            </van-popup>
                </li>
                <li>
                    <p style="color:#999999;">万物卡</p>
                    <p>无可用</p>
                </li>
                <li>
                    <p style="color:#999999;">云钻</p>
                    <p>共0云钻 ，满500云钻可用</p>
                </li>
            </ul>
            </div>

           <ul class="confirm_printing" style="margin-bottom:1rem;">
                <li>
                    <p>商品总金额</p>
                    <p style="font-weight:bold;">￥{{$route.query.total}}.00</p>
                </li>
                 <li>
                    <p>运费</p>
                    <p style="color:#FF5500;font-weight:bold;">￥0.00</p>
                </li>
                <li>
                    <p>优惠</p>
                    <p style="color:#FF5500;font-weight:bold;">￥-{{price}}.00</p>
                </li>
            </ul>

            <div class="confirm_check">
                 <p style="margin:5px 0 10px 0;">应付金额 <span style="color:#de3d96;font-weight:bold;">￥{{$route.query.total-price}}</span></p>
                  <div style="margin:10px;">
                 <van-button  type="primary" size="large" class="btn_back">结 算</van-button>
                 </div>
            </div>
    </div>
</template>



<script>
const coupon = {
  available: 1,
  condition: '无使用门槛',
  reason: '',
  value: 3000,
  name: '森马双十一活动卷',
  startAt: 1489104000,
  endAt: 1514592000,
  valueDesc: '30',
  unitDesc: '元'
};

import Vue from 'vue';
import { Dialog } from 'vant';
Vue.use(Dialog);
export default {
    data() {
        return {
      message:"" , 
      list:[] ,
      chosenCoupon: -1,
      coupons: [coupon],
      disabledCoupons: [coupon] , 
      showList:false , 
      price:0 , 
      addr:"" ,
      default_swi:false
        }
    },
    methods: {
      onChange(index) {
      this.showList = false;
      this.chosenCoupon = index;
      window.console.log(index)
      if(index == -1){
        this.price = 0;
      }else{
          this.price = this.coupons[0].valueDesc;
      }
        
    },
    onExchange(code) {
      this.coupons.push(coupon);
   
     window.console.log(code);
    } ,
        onUpper(){
            Dialog.confirm({
            title: '取消支付？',
            message: '妻管严？别担心 , 有万物卡！！！'
            }).then(() => {
             this.$router.go(-1);
            }).catch(() => {
             window.console.log(0);
            });
        } ,
        onSelect(user , price){
            this.axios.get('/wwsc/cart/select_commodity.php' , {
            params:{
                user:user ,
                price:price
             }
             })    
              .then((res)=>{
                this.list.push(res.data[0]);
            });
        } , 
        onAddrChange(){
            let data = {
           cart_commodity:this.$route.query.cart_commodity , 
           user:this.$route.query.user , 
           total:this.$route.query.total
            }
            this.$router.push({path:"/addr" , query:data});
        } , 
        onBool(){
             this.axios.get('/wwsc/addr/bool.php' , {
            params:{
                user:this.$route.query.user ,
                isDefault:true
            }
        })    
              .then((res)=>{
               if(this.$route.query.name && this.$route.query.tel && this.$route.query.address){
                this.addr = [{
                name: this.$route.query.name ,
                tel:  this.$route.query.tel , 
                address:this.$route.query.address
                }];
                window.console.log(this.addr);
                            }else{
                               this.addr = res.data; 
                window.console.log(this.addr);
                            }
            });
        }
    },
    created() {
        window.console.log("mysql测试");
        if(typeof(this.$route.query.cart_commodity) == "string"){
            this.onSelect(this.$route.query.user , this.$route.query.cart_commodity);
            }else{
          for(let i = 0; i < this.$route.query.cart_commodity.length; i++ ){
            this.onSelect(this.$route.query.user , this.$route.query.cart_commodity[i]);
        }
            }
       this.onBool();

       setTimeout(()=>{
         if(this.addr.length){
          this.default_swi = false;
       }else{
          this.default_swi = true;
       }
       } , 500)

     

        
    },
   
}
</script>

<style scoped>
.van-cell{
    padding: 10px 0;;
}
.van-cell__title{
    color: #999999;
}
.confirm_check{
    font-size: 0.14rem;
    background: #ffffff;
    text-align:center;
    position: fixed;
    bottom: 0px;
    width: 100%;
}
.confirm_printing{
    background: #ffffff;
     margin: 0 10px;
     padding: 0 10px;  
     border-radius: 10px; 
}
.confirm_printing li{
     display: flex;
     justify-content: space-between;
      font-size: 0.14rem;
}

.confirm_position{
    display: flex;
    height: 0.8rem;
    padding: 10px;
    background: #ffffff;
    border-radius:0 0 10px 10px;
}
.confirm_position li{
   font-size: 0.14rem;
}
.confirm_position li h3{
     line-height: 0; 
     margin-left:0.2rem; 
     margin-top:0.28rem; 
     }
.confirm_position li p{
  margin-left:0.2rem; 
     }
.confirm_position li img{
    margin-top:0.12rem; 
}
.confirm_goods {
      margin: 10px;
      background: #ffffff;
      border-radius: 10px;
      font-size: 0.12rem;
     }

.confirm_raduis{
    border-radius: 10px;
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
.btn_back{
    background: #de3d96;
    border: none;
}



</style>
