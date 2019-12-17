<template>
  <div>
    <ul class="land_hander">
      <li>
        <p class="land_hander_back" v-on:click="onUpper"></p>
      </li>
      <li style="flex-grow:1.2;text-align:left;">商品编辑</li>
    </ul>
    <div style="padding:0 20px;text-align:center;font-size:0.16rem;">
      <h1 class="img_text">图片预览处</h1>
      <img :src="imgsrc" width="80%" alt="图片路径错误 , 请检查 ，再次输入" />
    </div>

    <ul class="commodity_text" v-for="(value , index) in list" :key="index">
      <van-cell-group>
        <van-field v-model="value.shop" center clearable label="店铺名称：" placeholder="请输入店铺名称"></van-field>
      </van-cell-group>

      <van-cell-group>
        <van-field v-model="value.primary" center clearable label="商品原价：" placeholder="请输入原价价钱"></van-field>
      </van-cell-group>

      <van-cell-group>
        <van-field v-model="value.price" center clearable label="商品价钱：" placeholder="请输入商品价钱"></van-field>
      </van-cell-group>

      <van-cell-group>
        <van-field v-model="value.discount" center clearable label="商品折扣：" placeholder="请输入商品折扣"></van-field>
      </van-cell-group>

      <van-cell-group>
        <van-field v-model="value.volume" center clearable label="商品月销：" placeholder="请输入商品月销"></van-field>
      </van-cell-group>

      <van-cell-group>
        <van-field
          v-model="value.src"
          rows="2"
          autosize
          label="图片路径："
          type="textarea"
          placeholder="请输入商品图片路径"
          show-word-limit
        >
          <van-button slot="button" size="small" type="primary" v-on:click="onPreview(value.src)">预览</van-button>
        </van-field>
      </van-cell-group>

      <van-cell-group>
        <van-field
          v-model="value.title"
          rows="2"
          autosize
          label="商品标题："
          type="textarea"
          maxlength="80"
          placeholder="请输入商品标题"
          show-word-limit
        />
      </van-cell-group>
    </ul>

    <div style="margin:10px 15px;line-height:0;">
      <van-button type="danger" size="large" v-on:click="onLand">保 存</van-button>
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
      imgsrc: "../static/icon/returnw.png",
      list: []
    };
  },
  methods: {
    onUpper() {
      this.$router.go(-1);
    },
    onPreview(value) {
      this.imgsrc = value;
      window.console.log(value);
    },
    onLand() {
      this.onUpdata();
    },
    onSelect() {
      this.axios
        .get("/wwsc/detailed/select.php", {
          params: {
            id: this.$route.query.id
          }
        })
        .then(res => {
          window.console.log(res);
          this.imgsrc = res.data[0].src;
          this.list = res.data;
        });
    },
    onUpdata() {
      let data = {
        id: this.$route.query.id,
        shop: this.list[0].shop,
        primary: this.list[0].primary,
        price: this.list[0].price,
        discount: this.list[0].discount,
        volume: this.list[0].volume,
        src: this.list[0].src,
        title: this.list[0].title
      };
      this.axios
        .get("/wwsc/detailed/update.php", {
          params: data
        })
        .then(res => {
          Toast.success(res.data);
          setTimeout(() => {
            this.$router.go(-1);
          }, 2000);
        });
    }
  },

  created() {
    this.onSelect();
  }
};
</script>

<style scoped>
.commodity_text {
  font-size: 0.12rem;
}
.img_text {
  background: linear-gradient(to right, red, blue);
  -webkit-background-clip: text;
  color: transparent;
  margin: 10px;
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