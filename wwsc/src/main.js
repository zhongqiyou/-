import Vue from 'vue'
import App from './App.vue'
import {Uploader  , Sticky , PasswordInput, NumberKeyboard , AddressEdit , AddressList , Popup  , CouponCell, CouponList , SwipeCell  , List , Overlay , Toast  , Dialog  , DropdownMenu, DropdownItem, ImagePreview  , Field  , NoticeBar , SubmitBar , Button , Tabbar, TabbarItem , Search , Swipe , SwipeItem ,  CountDown , Divider ,  Sidebar , SidebarItem , TreeSelect , NavBar , Card ,  Checkbox, CheckboxGroup , Stepper, CellGroup, Cell } from 'vant'
import router from './router/index.js'
import axios from 'axios' 

Vue.prototype.axios = axios 

Vue.use(Button)
   .use(Tabbar)
   .use(TabbarItem)
   .use(Search)
   .use(Swipe)
   .use(SwipeItem)
   .use(CountDown)
   .use(Divider)
   .use(Sidebar)
   .use(SidebarItem)
   .use(TreeSelect)
   .use(NavBar)
   .use(Card)
   .use(Checkbox)
   .use(CheckboxGroup)
   .use(Stepper)
   .use(SubmitBar)
   .use(NoticeBar)
   .use(Field)
   .use(CellGroup)
   .use(ImagePreview)
   .use(DropdownMenu)
   .use(DropdownItem)
   .use(Dialog)
   .use(Toast)
   .use(Overlay)
   .use(List)
   .use(Cell)
   .use(SwipeCell)
   .use(CouponCell)
   .use(CouponList)
   .use(Popup)
   .use(AddressList)
   .use(AddressEdit)
   .use(PasswordInput)
   .use(NumberKeyboard)
   .use(Sticky)
   .use(Uploader);
   
  

  


Vue.config.productionTip = false

new Vue({
  router ,
  render: h => h(App),
}).$mount('#app')
