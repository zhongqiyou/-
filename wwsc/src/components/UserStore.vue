<template>
  <div style="background:#eeeeee;height:6.68rem;">
    <ul class="land_hander">
      <li>
        <p class="land_hander_back" v-on:click="onUpper"></p>
      </li>
      <li style="flex-grow: 1.2;">用户 / 商品</li>
    </ul>

    <ul class="personal">
      <transition name="fade">
        <li v-if="tran" v-on:click="onCommodity">商品管理</li>
      </transition>
      <transition name="fade1">
        <li v-if="tran" v-on:click="onUser">用户管理</li>
      </transition>
      <transition name="fade2">
        <li v-if="tran" v-on:click="onExit">退出</li>
      </transition>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tran: false
    };
  },
  methods: {
    onUpper() {
      this.$router.go(-1);
    },
    onUser() {
      this.$router.push({ path: "/account" });
    },
    onCommodity() {
      this.$router.push({ path: "/commoditystore" });
    },
    onExit() {
      this.$router.push({ path: "/home" });
    }
  },
  created() {
    setTimeout(() => {
      this.tran = true;
    }, 500);
  }
};
</script>

<style scoped>
.personal {
  margin: 1rem 10px;
}
.personal li {
  font-size: 0.24rem;
  font-weight: bold;
  margin: 30px 0;
  background: #07c160;
  padding: 15px;
  text-align: center;
  color: #fff;
  border-radius: 8px;
}
.personal li + li {
  background: #1989fa;
}
.personal li + li + li {
  background: #ff976a;
}
.land_hander {
  display: flex;
  padding: 5px;
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#eb3c3c),
    to(#ff7459)
  );
  color: #fff;
}
.land_hander li {
  height: 0.36rem;
  flex-grow: 1;
  font-size: 0.16rem;
  line-height: 0.36rem;
}
.land_hander_back {
  width: 0.3rem;
  height: 0.36rem;
  background-image: url("../../public/static/icon/returnw.png");
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: 0px 5px;
  margin: 0;
}
</style>

<style>
.fade-enter-active {
  animation: bounce-in 0.5s;
}
.fade-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: translateY(500px);
  }
  100% {
    transform: translateY(0px);
  }
}

.fade1-enter-active {
  animation: bounce-in 0.7s;
}
.fade1-leave-active {
  animation: bounce-in 0.7s reverse;
}
@keyframes bounce-in {
  0% {
    transform: translateY(500px);
  }
  100% {
    transform: translateY(0px);
  }
}

.fade2-enter-active {
  animation: bounce-in 0.9s;
}
.fade2-leave-active {
  animation: bounce-in 0.9s reverse;
}
@keyframes bounce-in {
  0% {
    transform: translateY(500px);
  }
  100% {
    transform: translateY(0px);
  }
}
</style>