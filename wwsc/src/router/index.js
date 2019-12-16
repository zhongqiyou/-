import Vue from 'vue'   
import Router from 'vue-router' 
import Hello from '@/components/Home' 
import Class from '@/components/Class' 
import Cart from '@/components/Cart' 
import My from '@/components/My' 
import SearchReally from '@/components/SearchReally' 
import Land from '@/components/Land' 
import Register from '@/components/Register' 
import Confirm from '@/components/Confirm' 
import Commodity from '@/components/Commodity' 
import Detailed from '@/components/Detailed' 
import Search from '@/components/small_components/Search' 
import List from '@/components/small_components/List'
import SearchList from '@/components/small_components/SearchList'
import Reset from '@/components/Reset'
import Addr from '@/components/Addr'
import AddrDetailed from '@/components/AddrDetailed'
import Edit from '@/components/Edit'
import Personal from '@/components/Personal'
import Store from '@/components/Store'
import UserStore from '@/components/UserStore'
import Account from '@/components/Account'
import UserEdit from '@/components/UserEdit'
import CommodityStore from '@/components/CommodityStore'
import CommodityEdit from '@/components/CommodityEdit'
import CommodityAdd from '@/components/CommodityAdd'
import Top from '@/components/small_components/Top'
import Poster from '@/components/small_components/Poster'



 
Vue.use(Router)  
 
export default new Router({
  routes: [          
    { path: '/', redirect: '/home'} , 
    {                    
      path: '/home',            
      component: Hello   
    } , 
    {                    
        path: "/class",            
        component: Class   
      } , 
      {                    
        path: '/cart',            
        component: Cart   
      } , 
      {                    
        path: '/my',            
        component: My   
      } , 
      {
        path:"/searchreally" , 
        component:SearchReally
      },
      {
        path:"/land" , 
        component:Land
      } ,
      {
        path:"/register" , 
        component:Register
      },
      {
        path:"/confirm/:id" , 
        name:"confirm" ,
        component:Confirm
      } , 
      {
        path:"/commodity" , 
        name:"commodity" ,
        component:Commodity
      } ,
      {
        path:"/detailed" , 
        component:Detailed
      } ,
      {
        path:"/search" , 
        component:Search
      } ,
      {
        path:"/list" , 
        component:List
      } ,
      {
        path:"/SearchList" , 
        component:SearchList
      } , 
      {
        path:"/reset" , 
        component:Reset
      } ,
      {
        path:"/addr" , 
        component:Addr
      } ,
      {
        path:"/addrdetailed" , 
        component:AddrDetailed
      } ,
      {
        path:"/edit" , 
        component:Edit
      } ,
      {
        path:"/personal" , 
        component:Personal
      } , 
      {
        path:"/store" , 
        component:Store
      } ,
      {
        path:"/userstore" , 
        component:UserStore
      } ,
      {
        path:"/account" , 
        component:Account
      },
      {
        path:"/useredit" , 
        component:UserEdit
      } ,
      {
        path:"/commoditystore" , 
        component:CommodityStore
      } , 
      {
        path:"/commodityedit" , 
        component:CommodityEdit
      } ,
      {
        path:"/commodityadd" , 
        component:CommodityAdd
      } ,
      {
        path:"/top" , 
        component:Top
      } ,
      {
        path:"/poster" , 
        component:Poster
      }

  ]
})
