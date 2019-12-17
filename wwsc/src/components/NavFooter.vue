<template>
  <div>
    <van-tabbar v-model="active" active-color="#fa0" inactive-color="#000" route>
      <van-tabbar-item replace to="/home">
        <span>首页</span>
        <img slot="icon" slot-scope="props" :src="props.active ? icon.active : icon.inactive" />
      </van-tabbar-item>

      <van-tabbar-item replace to="/class">
        <span>分类</span>
        <img slot="icon" slot-scope="props" :src="props.active ? icon.active1 : icon.inactive1" />
      </van-tabbar-item>

      <van-tabbar-item replace to="/cart">
        <span>购物车</span>
        <img slot="icon" slot-scope="props" :src="props.active ? icon.active2 : icon.inactive2" />
      </van-tabbar-item>

      <van-tabbar-item replace to="/my">
        <span>我的易购</span>
        <img slot="icon" slot-scope="props" :src="props.active ? icon.active3 : icon.inactive3" />
      </van-tabbar-item>
    </van-tabbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: 0,
      icon: {
        active: "./static/homes.png",
        inactive: "./static/home.png",

        active1: "./static/classs.gif",
        inactive1: "./static/class.png",

        active2: "./static/carts.png",
        inactive2: "./static/cart.png",

        active3: "./static/mys.png",
        inactive3: "./static/my.png"
      }
    };
  }
};
</script>

<style scoped>
</style>
    
