<template>
  <div>
    <ul class="land_hander">
      <li>
        <p class="land_hander_back" v-on:click="onUpper"></p>
      </li>
      <li style="flex-grow:10;text-align:center;">万物登陆</li>
      <li style="flex-grow:0.3" v-on:click="onStore">管理</li>
    </ul>

    <div class="land_user">
      <p>
        <img src="../../public/static/icon/user.jpg" width="100%;" alt />
      </p>
    </div>

    <div v-if="user_swi">
      <van-cell-group>
        <van-field v-model="username" clearable type="text" placeholder="请输入用户名"></van-field>
        <hr style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:0 10px;" />
        <van-field v-model="password" type="password" placeholder="请输入密码"></van-field>
        <hr style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:0 10px;" />
      </van-cell-group>
    </div>

    <div v-else>
      <van-cell-group>
        <van-field v-model="user_phone" clearable type="text" placeholder="请输入手机号"></van-field>
        <hr style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:0 10px;" />
        <van-field v-model="pass_phone" type="password" placeholder="请输入验证码">
          <van-button
            slot="button"
            size="small"
            style="color:red"
            v-on:click="countDown"
          >{{count_down}}</van-button>
        </van-field>
        <hr style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:0 10px;" />
      </van-cell-group>
    </div>

    <div style="margin:10px 15px;line-height:0;">
      <van-button type="primary" size="large" v-on:click="onLand">登 陆</van-button>
    </div>
    <ul class="land_swi">
      <li style="color:#666666;">
        <span v-on:click="userSwi">{{user_swi_text}}</span>
        |
        <router-link to="/register">
          <span style="color:rgb(102, 102, 102);">注册</span>
        </router-link>
      </li>
      <li v-if="user_swi" style="text-align:right;color:red;" v-on:click="onReset">忘记密码？</li>
    </ul>

    <van-divider
      :style="{ color: '#cccccc', borderColor: '#999999', padding: '0 16px' , fontSize:'0.16rem', marginTop:'2.05rem'}"
    >其他登陆方式</van-divider>

    <ul class="land_quick">
      <li v-for="(value  , index) in quick" :key="index">
        <img :src="value.src" alt />
        <p style="font-size:0.10rem;">{{value.text}}</p>
      </li>
    </ul>
    <p class="land_treaty">
      登录即代表您已同意
      <span style="color:#4a90e2;">《万物商城隐私政策以及条约》</span>
    </p>
  </div>
</template>

<script>
import Vue from "vue";
import { Dialog, Toast } from "vant";
Vue.use(Dialog).use(Toast);
export default {
  data() {
    return {
      username: "",
      password: "",
      user_phone: "",
      pass_phone: "",
      user_swi_text: "短信登陆",
      user_swi: true,
      count_down: "获取验证码",
      swi_randow: true,
      random_number: "123465",
      quick: [
        { src: "../static/icon/qq.png", text: "QQ" },
        { src: "../static/icon/wechat.png", text: "微信" },
        { src: "../static/icon/alipay.png", text: "支付宝" }
      ]
    };
  },
  methods: {
    onStore() {
      window.console.log(123);
      this.$router.push({ path: "/store" });
    },
    userSwi() {
      if (this.user_swi_text == "短信登陆") {
        this.user_swi_text = "账号登陆";
        this.user_swi = false;
      } else {
        this.user_swi_text = "短信登陆";
        this.user_swi = true;
      }
    },
    countDown() {
      if (this.swi_randow) {
        this.swi_randow = false;
        let num = 60;
        this.random_number = parseInt(Math.random() * 1000000);
        window.console.log(this.random_number);
        let time = setInterval(() => {
          this.count_down = `${num--}s后重新获取`;
          if (num <= 0) {
            clearInterval(time);
            this.count_down = `重新获取`;
            this.swi_randow = true;
          }
          if (num == 50) {
            Dialog.alert({
              title: "请查收验证码：",
              message: this.random_number
            }).then(() => {});
          }
        }, 100);
      }
    },
    onLand() {
      if (
        this.pass_phone == this.random_number &&
        this.user_phone == "13824823170"
      ) {
        Dialog.alert({
          title: "登陆成功",
          message: " 这只是一个测试 ， 不跳转"
        }).then(() => {
          this.user_phone = "";
          this.pass_phone = "";
        });
      } else {
        this.onselect();
      }
    },
    onUpper() {
      this.$router.go(-1);
    },
    onselect() {
      this.axios
        .get("/wwsc/land/select.php", {
          params: {
            username: this.username,
            password: this.password
          }
        })
        .then(res => {
          if (res.data == "登陆成功") {
            Toast.success(res.data);
            setTimeout(() => {
              this.onUserName();
              this.$router.push({
                path: "/my",
                query: { username: this.username, exit: true }
              });
            }, 2000);
          } else if (res.data == "账号密码不匹配 , 请重试") {
            Toast.fail(res.data);
          }
        });
    },
    onUserName() {
      this.axios
        .get("/wwsc/user/insert.php", {
          params: {
            username: this.username
          }
        })
        .then(res => {
          window.console.log(res.data);
        });
    },
    onReset() {
      this.$router.push({ path: "/reset", query: {} });
    }
  }
};
</script>

<style scoped>
.land_treaty {
  margin: 20px;
  text-align: center;
  font-size: 0.14rem;
  color: #999999;
}
.land_quick {
  display: flex;
  height: 0.5rem;
  margin: 10px 30px;
}
.land_quick li {
  flex-grow: 1;
  text-align: center;
  margin: 0;
  line-height: 0;
}
.land_quick li img {
  width: 30%;
}
.land_quick li p {
  margin: 10px 0 0 0;
  font-size: 0.14rem;
  color: #777;
}
.land_swi {
  display: flex;
  margin: 10px;
}
.land_swi li {
  font-size: 0.12rem;
  flex-grow: 1;
}

.van-button--large {
  font-weight: bold;
  font-size: 0.2rem;
  background: #f56723;
  border: none;
  border-radius: 8px;
}
.land_user {
  height: 0.5rem;
  display: flex;
  justify-content: center;
  margin: 10px;
}
.land_user p {
  width: 0.5rem;
  height: 0.5rem;
  margin: 0;
  line-height: 0;
}
.land_user p img {
  border-radius: 0.25rem;
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