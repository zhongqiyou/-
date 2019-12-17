<template>
  <div style="background:#eeeeee;height:6.2rem;">
    <div class="my_hander">
      <van-nav-bar title="我的易购">
        <div slot="right" style="text-align:right;" v-on:click="onPersonal">
          <img
            src="../../public/static/icon/set.png"
            width="10%"
            style="vertical-align: middle;"
            alt
          />
        </div>
      </van-nav-bar>

      <ul class="my_hander_user">
        <li>
          <img
            src="../../public/static/icon/user.jpg"
            v-on:click="onland"
            style="border-radius: 0.4rem;"
            alt
          />
          <span style="vertical-align:-0.3rem;margin-left:10px;">{{username}}</span>
          <span
            v-if="exit"
            style="margin-left:10px;vertical-align:-0.3rem;color:#cece11;font-size:0.14rem;text-decoration:underline;"
            v-on:click="onExit"
          >[退出]</span>
        </li>

        <li style="text-align:right;" v-on:click="onMenber">
          <img src="../../public/static/icon/code.png" alt />
        </li>
        <van-overlay :show="show" v-on:click="show=false">
          <div class="wrapper">
            <div class="block" @click.stop>
              <img src="../../public/static/icon/menber_code.png" alt />
              <p>{{username}}的会员</p>
            </div>
          </div>
        </van-overlay>
      </ul>

      <ul class="my_hander_nav">
        <li v-for="(value , index) in hander_nav" :key="index">
          <p>
            <strong>{{value.num}}</strong>
          </p>
          <p>{{value.text}}</p>
        </li>
      </ul>
    </div>

    <div class="my_hander_member">
      <p>
        <img src="../../public/static/icon/menber.png" width="20%" alt />
        <span>[免费]你可领取一张运费卷</span>
      </p>
      <p>
        <span style="vertical-align: -17px;color:#777777;">立刻领取</span>
      </p>
    </div>

    <div class="my_main_nav">
      <p style="margin-bottom:10px;">
        <strong>我的订单</strong>
      </p>
      <ul>
        <li v-for="(value , index) in main_nav" :key="index" style="margin:10px 0;width:25%;">
          <img :src="value.src" width="50%" alt />
          <p style="font-size:0.10rem;">{{value.text}}</p>
        </li>
      </ul>
    </div>

    <div class="my_main_nav">
      <p style="margin-bottom:10px;">
        <strong>必备工具</strong>
      </p>
      <ul style="flex-wrap: wrap;">
        <li v-for="(value , index) in main_nav2" :key="index" style="margin:10px 0;width:25%;">
          <img :src="value.src" width="50%" alt />
          <p style="font-size:0.10rem;">{{value.text}}</p>
        </li>
      </ul>
    </div>
    <NavFooter></NavFooter>
  </div>
</template>


<script>
import Vue from "vue";
import { Dialog, Toast } from "vant";
Vue.use(Dialog).use(Toast);
import NavFooter from "./NavFooter";
export default {
  data() {
    return {
      exit: false,
      show: false,
      username: "未登录",
      hander_nav: [
        { num: "0", text: "优惠券" },
        { num: "0", text: "领云钻" },
        { num: "0", text: "足迹" },
        { num: "0", text: "我的关注" }
      ],
      main_nav: [
        { src: "..//static/icon/one.webp", text: "待付款" },
        { src: "..//static/icon/two.webp", text: "待发货" },
        { src: "..//static/icon/three.webp", text: "待收货" },
        { src: "..//static/icon/four.webp", text: "评价" },
        { src: "..//static/icon/five.webp", text: "退款/售后" }
      ],
      main_nav2: [
        { src: "..//static/icon/six.webp", text: "每日返现" },
        { src: "..//static/icon/seven.webp", text: "天猫农场" },
        { src: "..//static/icon/eight.webp", text: "闲置换钱" },
        { src: "..//static/icon/nine.webp", text: "客户小蜜" },
        { src: "..//static/icon/ten.webp", text: "花呗" },
        { src: "..//static/icon/eleven.webp", text: "我的快递" },
        { src: "..//static/icon/twelve.webp", text: "领劵中心" },
        { src: "..//static/icon/thirteen.webp", text: "主题换肤" }
      ]
    };
  },
  methods: {
    onExit() {
      Dialog.confirm({
        title: "退出当前账号？",
        message: "期待下次登录"
      }).then(() => {
        this.onDelete();
      });
    },
    onland() {
      if (this.username == "未登录") {
        this.$router.push({ path: "/land" });
      }
    },
    onSelect() {
      this.axios.get("/wwsc/user/select.php").then(res => {
        if (res.data) {
          this.username = res.data;
          this.exit = true;
        }
      });
    },
    onDelete() {
      this.axios.get("/wwsc/user/delete.php").then(res => {
        window.console.log(res.data);
        this.exit = false;
        this.username = "未登录";
      });
    },
    onMenber() {
      if (this.username == "未登录") {
        Toast.fail("用户未登录");
      } else {
        this.show = true;
      }
    },
    onPersonal() {
      if (this.username == "未登录") {
        Toast.fail("用户未登录");
      } else {
        this.$router.push({
          path: "/personal",
          query: { user: this.username }
        });
      }
    }
  },

  created() {
    this.onSelect();
  },

  components: {
    NavFooter
  }
};
</script>

<style scoped>
.my_hander {
  height: 2rem;
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#eb3c3c),
    to(#ff7459)
  );
}
.van-nav-bar {
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#eb3c3c),
    to(#ff7459)
  ) !important;
}
.van-nav-bar__title {
  font-weight: bold;
  color: #ffffff;
}
.van-nav-bar {
  background: transparent;
}
[class*="van-hairline"]::after {
  border: none;
}
.my_hander_user {
  display: flex;
  height: 0.8rem;
  font-size: 0.2rem;
  justify-content: space-between;
  margin: 0 10px;
}
.my_hander_user li img {
  vertical-align: -0.5rem;
  width: 0.6rem;
  height: 0.6rem;
}
.my_hander_nav {
  display: flex;
  justify-content: space-around;
  margin-top: 10px;
}
.my_hander_nav p {
  margin: 0;
  font-size: 0.15rem;
  text-align: center;
}
.my_hander_member {
  display: flex;
  padding: 10px;
  margin: 0 10px;
  margin-top: -0.18rem;
  justify-content: space-between;
  background: #ffffff;
  border-radius: 10px;
}
.my_hander_member p {
  margin: 0;
  line-height: 0;
  font-size: 14px;
}
.my_hander_member p span {
  margin-left: 10px;
  vertical-align: 12px;
}
.my_main_nav p {
  margin: 0;
  font-size: 0.14rem;
}
.my_main_nav {
  padding: 10px;
  margin: 10px 10px;
  background: #ffffff;
  border-radius: 10px;
}
.my_main_nav ul {
  display: flex;
  justify-content: space-between;
}
.my_main_nav ul li {
  text-align: center;
  font-size: 0.12rem;
  color: #999999;
}
.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}

.block {
  width: 3rem;
  height: 3rem;
  background-color: #fff;
  text-align: center;
  border-radius: 15px;
  padding: 25px 8px 8px 8px;
}
.block > img {
  margin-top: 8px;
}
.block > p {
  margin: 0;
}
</style>