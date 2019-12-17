<template>
  <div>
    <ul class="land_hander">
      <li>
        <p class="land_hander_back" v-on:click="onUpper"></p>
      </li>
      <li style="flex-grow: 1.2;">重置密码</li>
    </ul>
    <div style="margin-top:20px;">
      <van-cell-group>
        <van-field
          v-model="username"
          clearable
          label="手机号"
          maxlength="11"
          placeholder="请输入手机号"
          class="input_text"
        />
        <hr
          style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:3px 10px;"
        />
        <van-field
          v-model="sms"
          center
          clearable
          label="短信验证码"
          placeholder="请输入短信验证码"
          class="input_text"
        >
          <van-button
            slot="button"
            size="small"
            style="color:red"
            v-on:click="countDown"
          >{{count_down}}</van-button>
        </van-field>
        <hr
          style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:3px 10px;"
        />
        <van-field
          v-model="password"
          type="password"
          label="设置新密码"
          maxlength="20"
          placeholder="字母 , 数字 , 特殊字符组合 至少11位"
          class="input_text"
        />
        <hr
          style="width:95%; height: 1px; border: none; background-color: #cccccc;margin:3px 10px;"
        />
      </van-cell-group>
    </div>

    <div style="margin:10px 15px;line-height:0;">
      <van-button type="primary" size="large" v-on:click="onRegister">确 定</van-button>
    </div>
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
      sms: "",
      password: "",
      count_down: "获取验证码",
      random_number: "123",
      swi_randow: true
    };
  },

  methods: {
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
    onUpper() {
      this.$router.go(-1);
    },

    onRegister() {
      let userRegular = /^1[3456789]\d{9}$/;
      let passRegular = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?.+-/&])[A-Za-z\d$@@$!%*#?.+-/&]{8,20}$/;
      if (
        this.sms == this.random_number &&
        userRegular.test(this.username) &&
        passRegular.test(this.password)
      ) {
        this.onUpdate();
      } else {
        Toast.fail("重置失败 , 格式有误???");
      }
    },
    onUpdate() {
      this.axios
        .get("/wwsc/reset/update.php", {
          params: {
            username: this.username,
            password: this.password
          }
        })
        .then(res => {
          window.console.log(res);
          if (res.data == "恭喜你 , 密码重置完成") {
            Toast.success(res.data);
            setTimeout(() => {
              this.$router.go(-1);
            }, 2000);
          } else {
            Toast.fail(res.data);
          }
        });
    }
  }
};
</script>

<style scoped>
.input_text {
  color: #323233;
}
.land_treaty {
  margin: 20px;
  text-align: center;
  font-size: 0.14rem;
  color: #999999;
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
.van-button--large {
  font-weight: bold;
  font-size: 0.2rem;
  background: #f56723;
  border: none;
  border-radius: 8px;
}
</style>