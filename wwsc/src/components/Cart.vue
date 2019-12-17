<template>
  <div style="font-size:0.12rem;background:#eeeeee;height:5rem;">
    <van-nav-bar
      title="购物车"
      :right-text="select_del"
      v-on:click-right="onClickRight"
      class="hander_back"
    />

    <div class="cart_one" v-if="cart_commodity_swi">
      <van-checkbox v-model="checked" @click="checkAll">
        <ul style="display:flex;justify-content: space-between;">
          <li>
            <img
              src="../../public/static/icon/shop.png"
              width="15%"
              style="vertical-align: -0.05rem;margin:0 5px;"
              alt
            />森马男装专卖店
            <span style="color:#777777;">＞</span>
          </li>
          <li style="color:#eb3c3c;" v-on:click.stop="onVolume">领劵</li>
        </ul>
      </van-checkbox>
      <van-checkbox-group v-model="result" ref="checkboxGroup">
        <div
          v-for="(value , index) in list"
          :key="index"
          v-on:click="onIndex(value.id , value.check)"
        >
          <van-checkbox :name="value.price">
            <van-card
              :num="value.number"
              :price="value.price"
              :desc="value.detailed"
              :title="value.title"
              :thumb="value.src"
            >
              <div slot="footer">
                <button class="cart_btn" @click.stop="onNumberReduce(value.id , value.number)">-</button>
                <input class="cart_text" type="text" v-model="value.number" />
                <button class="cart_btn" @click.stop="onNumberAdd(value.id , value.number)">+</button>
              </div>
            </van-card>
          </van-checkbox>
        </div>
      </van-checkbox-group>
    </div>

    <div style="text-align:center;color:#777777;padding:50px;" v-if="cart_null_swi">
      <img src="../../public/static/icon/cart_null.png" width="30%" alt />
      <p style="font-size:0.15rem">购物车还是空的，快来挑选好货吧</p>
      <p style="margin-bottom:80px;">
        <span style="background:#ffffff;padding:5px;border-radius:5px;">去逛逛</span>
      </p>
      <van-divider :style="{ color: '#cccccc', borderColor: '#999999', padding: '0 16px' }">没有更多啦</van-divider>
    </div>
    <van-submit-bar
      style="margin-bottom:50px;"
      :price="onTotal*100"
      :button-text="select"
      @submit="onSubmit"
    >
      <span slot="tip">
        <van-notice-bar text="温馨提示：在双十一活动期间购买的商品 , 在72小时后配货派送!!!" left-icon="volume-o" />
      </span>
    </van-submit-bar>
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
      result: [],
      checked: false,
      total: 0,
      select_del: "编辑",
      select: "提交订单",
      user: "",
      list: [],
      num_arr: [],
      arr: [],
      check_arr: [],
      price_arr: [],
      cart_null_swi: false,
      cart_commodity_swi: true
    };
  },
  methods: {
    onIndex(id, check) {
      if (check == "true") {
        check = false;
      } else if (check == "false") {
        check = true;
      }
      this.onUpdateCheck(id, check);
    },
    onNumberReduce(id, number) {
      if (number > 1) {
        this.onUpdateReduce(number, id);
      }
    },
    onNumberAdd(id, number) {
      this.onUpdateAdd(number, id);
    },

    onUpdateCheck(id, check) {
      this.axios
        .get("/wwsc/cart/update_check.php", {
          params: {
            user: this.user,
            id: id,
            check: check
          }
        })
        .then(res => {
          window.console.log(res);
        });
    },

    onUpdateAdd(number, id) {
      this.axios
        .get("/wwsc/cart/update.php", {
          params: {
            user: this.user,
            id: id,
            number: parseInt(number) + 1
          }
        })
        .then(res => {
          window.console.log(res);
        });
    },
    onUpdateReduce(number, id) {
      this.axios
        .get("/wwsc/cart/update.php", {
          params: {
            user: this.user,
            id: id,
            number: parseInt(number) - 1
          }
        })
        .then(res => {
          window.console.log(res);
        });
    },
    onClickRight() {
      if (this.select_del == "编辑") {
        this.select_del = "完成";
        this.select = "删除";
      } else {
        this.select_del = "编辑";
        this.select = "提交订单";
      }
    },
    checkAll() {
      if (this.checked == true) {
        this.whoChech("false");
        this.$refs.checkboxGroup.toggleAll(false);
      } else {
        this.whoChech("true");
        this.$refs.checkboxGroup.toggleAll(true);
      }
      window.console.log(this.checked);
    },
    onSubmit() {
      if (this.select == "提交订单") {
        if (this.result.length) {
          this.$router.push({
            name: "confirm",
            query: {
              cart_commodity: this.result,
              user: this.user,
              total: this.onTotal
            }
          });
        } else {
          Toast.fail("没选择商品");
        }
      }

      if (this.select == "删除") {
        let index = "";
        for (var i = this.result.length - 1; i >= 0; i--) {
          index = this.result.findIndex(value => {
            return value == this.result[i];
          });
          this.onDelete(this.result[index]);
          this.result.splice(index, 1);
        }
      }
    },
    onVolume() {
      window.console.log(123);
    },
    onSelectUser() {
      this.axios.get("/wwsc/user/select.php").then(res => {
        this.user = res.data;
        window.console.log(this.user);
      });
    },
    onSelect() {
      this.axios
        .get("/wwsc/cart/select.php", {
          params: {
            user: this.user
          }
        })
        .then(res => {
          this.list = res.data;
          this.num_arr = res.data.map(value => {
            return value.number;
          });
          this.check_arr = res.data.map(value => {
            return value.check;
          });
          this.price_arr = res.data.map(value => {
            return value.price;
          });

          if (this.list == "") {
            this.cart_null_swi = true;
            this.cart_commodity_swi = false;
          } else {
            this.cart_null_swi = false;
            this.cart_commodity_swi = true;
          }
        });
    },

    onDelete(price) {
      this.axios
        .get("/wwsc/cart/delete.php", {
          params: {
            user: this.user,
            price: price
          }
        })
        .then(res => {
          Toast.success(res.data);
        });
    },

    whoChech(check) {
      this.axios
        .get("/wwsc/cart/whol_chech.php", {
          params: {
            check: check
          }
        })
        .then(res => {
          window.console.log(res);
        });
    }
  },
  computed: {
    onTotal() {
      let total_num = 0;
      for (let i = 0; i < this.num_arr.length; i++) {
        if (this.check_arr[i] == "true") {
          total_num += this.price_arr[i] * this.num_arr[i];
        }
      }
      return total_num;
    }
  },
  watch: {
    result: function() {
      if (this.result.length >= this.num_arr.length) {
        this.$refs.checkboxGroup.toggleAll(true);
        this.checked = true;
      } else {
        this.checked = false;
      }
    },
    list: function() {
      this.onSelect();
    },

    num_arr: function() {
      //   window.console.log(this.onTotal);
    }
  },
  components: {
    NavFooter
  },

  created() {
    this.onSelectUser();
    setTimeout(() => {
      if (!this.user) {
        this.$router.push({ path: "/land" });
      } else {
        this.onSelect();
      }
    }, 400);

    setTimeout(() => {
      for (let i = 0; i < this.num_arr.length; i++) {
        this.whoChech("false");
        window.console.log(i);
      }
    }, 800);
  }
};
</script>

<style scoped>
.hander_back {
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#eb3c3c),
    to(#ff7459)
  );
}
.van-nav-bar__title {
  color: #ffffff;
}
.cart_text {
  width: 40px;
  height: 32px;
  margin: 0 2px;
  padding: 0;
  color: #323233;
  font-size: 14px;
  text-align: center;
  vertical-align: middle;
  background-color: #f2f3f5;
  border: 0;
  border-width: 1px 0;
  border-radius: 0;
  -webkit-appearance: none;
}
.cart_btn {
  width: 0.32rem;
  height: 0.32rem;
  border-radius: 4px 0 0 4px;
  color: #323233;
  background-color: #eeeeee;
  border: 0;
}

.cart_one {
  background: #ffffff;
  margin: 10px;
  padding: 10px;
  border-radius: 10px;
  margin-bottom: 140px;
}
</style>
<style>
.van-checkbox__icon .van-icon {
  border: 1px solid #cccccc !important;
}
.van-checkbox__label {
  width: 100%;
}
.van-submit-bar__tip {
  padding: 0 !important;
}
</style>