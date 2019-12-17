<template>
  <div style="background:#eeeeee; overflow: auto;" v-on:scroll="handleScroll()">
    <div class="detailed_hander">
      <ul :class="{'title_fixed':swi_title_fixed}">
        <li>
          <div v-on:click="onUpper" style="text-align:left;">
            <img src="../../public/static/icon/returnd.png" width="80%" alt />
          </div>
        </li>
        <li>
          <div>
            <img src="../../public/static/icon/Collection.png" width="80%" alt />
          </div>
          <div>
            <img src="../../public/static/icon/share.png" width="80%" alt />
          </div>
          <div>
            <img src="../../public/static/icon/more.png" width="80%" alt />
          </div>
        </li>
      </ul>
      <van-swipe :autoplay="3000" indicator-color="white" class="detailed_wheel">
        <van-swipe-item v-for="(value , index) in images" :key="index">
          <img :src="value" width="100%" height="100%" v-on:click="onImages" />
        </van-swipe-item>
      </van-swipe>
    </div>

    <div class="detailed_title" v-for="(value , index) in list" :key="index">
      <p class="detailed_title_p1">
        <span
          style="background:#de3d96;color:#fff;border-radius:5px;font-size:0.15rem;padding:5px;"
        >疯抢价</span>
        <span style="color:#eb5211;font-size:0.24rem;font-weight:bold;">￥{{value.price}}</span>
        <span
          style="font-size:0.14rem;color:#cccccc; text-decoration: line-through;"
        >{{value.primary}}</span>
        <i style="font-size:0.12rem;">{{value.discount}}折</i>
      </p>

      <p>{{value.title}}</p>

      <p>月销量{{value.volume}}</p>
    </div>

    <div class="detailed_color">
      <p>
        <strong>款式</strong>
      </p>
      <ul>
        <li
          v-for="(value , index) in color_arr"
          :key="index"
          ref="oncolor"
          v-on:click="onColorChange(index , value.text)"
        >
          <p>
            <img :src="value.src" width="100%" alt />
          </p>
          <p>{{value.text}}</p>
        </li>
      </ul>
    </div>

    <div class="detailed_size">
      <div class="detailed_size_div">
        <p style="font-size:0.14rem;">
          <strong>尺码</strong>
        </p>
        <p style="color:#4a90e2;">查看尺码表</p>
      </div>

      <ul>
        <li
          v-for="(value , index) in size"
          :key="index"
          ref="onsize"
          v-on:click="onSizeChange(value)"
        >{{value}}</li>
      </ul>
    </div>

    <div class="detailed_addr">
      <p>
        <strong>配送至</strong>
        <span style="color:#999999;margin-left:0.1rem;padding:0 1px;">请选择配送地址</span>
        <img
          src="../../public/static/icon/addr.png"
          width="5%;"
          style=" vertical-align: middle;"
          alt
        />
      </p>

      <p>
        <strong>运费</strong>
        <span style="color:#999999;margin-left:0.25rem;padding:0 1px;">新会员专享首单满38元免邮</span>
      </p>
    </div>

    <div class="detailed_package">
      <ul>
        <li v-for="(value , index) in package_text" :key="index">
          <img src="../../public/static/icon/package.png" alt />
          {{value}}
        </li>
      </ul>
    </div>

    <div class="detailed_store">
      <div>
        <p>
          <img src="../../public/static/detailed/logo.webp" alt />
          <span>森马</span>
        </p>
        <p>
          <span>关注</span>
          <span>进店</span>
        </p>
      </div>

      <ul>
        <li v-for="(value , index) in store_image" :key="index">
          <img :src="value.src" width="100%" alt />
          <p>{{value.text}}</p>
        </li>
      </ul>
    </div>

    <div class="detailed_user">
      <p style="font-weight:bold;">用户口碑</p>
      <p>98%人认为尺码合适</p>
      <ul>
        <li>
          <img
            src="../../public/static/detailed/user.png"
            style="vertical-align: -0.07rem;margin-right:5px;"
            width="10%"
            alt
          />
          <span style="color:#999999">185******185</span>
          <p style="color:#777777;">尺码合适 ， 长短也刚刚好。面料蛮舒服的 ， 有弹性 ， 穿上很舒服 ， 开始还担心尺码偏小。物美廉价 ，很开心！！！</p>
        </li>
        <li>
          <img src="../../public/static/detailed/color_two.webp" width="100%;" alt />
        </li>
      </ul>
      <p>查看全部</p>
    </div>

    <div class="detailed_detailed">
      <p style="font-weight: bold;">商品介绍</p>
      <ul>
        <li v-for="(value , index) in onOpen_arr" :key="index">
          <p>{{value.title}}</p>
          <p>{{value.text}}</p>
        </li>
      </ul>
      <p
        style="color:rgb(74, 144, 226);font-size:0.12rem;text-align:right;"
        v-on:click="onOpen"
      >{{open}}</p>
    </div>

    <div class="detailed_contact">
      <p>
        <strong>售后与咨询</strong>
      </p>
      <p>
        <img src="../../public/static/detailed/contact.png" alt />购买咨询
      </p>
    </div>

    <div class="detailed_image" style="font-size:0; margin-bottom:0;">
      <p>
        <strong>图文详情</strong>
      </p>
      <div style="padding:10px;margin:10px 0; font-size:0;">
        <img src="../../public/static/detailed/one.webp" width="100%" alt />
      </div>
      <img src="../../public/static/detailed/two.webp" width="100%" alt />
    </div>

    <div style="font-size:0;background:#ffffff;">
      <img v-for="(value , index) in details_img" :key="index" :src="value" width="100%" alt />
      <div class="detailed_explain">
        <p>
          <strong>价格说明</strong>
        </p>
        <p style="color:#999999;margin:0;">{{onOpenExplainArr}}</p>
        <p
          style="color:rgb(74, 144, 226);font-size:0.12rem;text-align:right;margin:0;"
          v-on:click="onExplainOpen"
        >{{explain_open}}</p>
      </div>
    </div>
    <div style="margin-bottom:70px;">
      <van-divider
        :style="{ color: '#cccccc', borderColor: '#cccccc', padding: '0 16px' }"
      >已经到底啦 , 再往上逛逛吧</van-divider>
    </div>

    <ul class="detail_cart">
      <li class="crat_number" v-on:click="onCartRouter">
        <img src="../../public/static/detailed/cart.png" width="40%" alt />
        <span v-if="swi_crat">{{crat_number}}</span>
      </li>
      <li v-on:click="onAddCart">加入购物车</li>
    </ul>
  </div>
</template>

<script>
import Vue from "vue";
import { Dialog, Toast, ImagePreview } from "vant";
Vue.use(Dialog)
  .use(Toast)
  .use(ImagePreview);

export default {
  data() {
    return {
      swi_title_fixed: false,
      images: [
        "../static/male/male_one.webp",
        "../static/male/male_two.webp",
        "../static/male/male_three.webp",
        "../static/male/male_four.webp"
      ],
      size: ["XS", "S", "M", "L", "XL", "XXL", "XXXL"],
      package_text: [
        "万物自营",
        "7天无理由退货",
        "退货返还万物币",
        "7天可换",
        "买赠唯品币"
      ],
      store_image: [
        { src: "../static/male/male_five.webp", text: "￥210" },
        { src: "../static/male/male_six.webp", text: "￥84" },
        { src: "../static/male/male_seven.webp", text: "￥112" }
      ],
      detailed_text: [
        { title: "产地", text: "中国" },
        { title: "领型", text: "翻领" },
        {
          title: "风格",
          text:
            "日韩 , 休闲 , 时尚 , 潮流 , 百搭 , 学院风 , 牛仔系 , 青春活力 , 基础大众"
        },
        { title: "流行元素", text: "多口袋 , 纽扣 , 直下摆" },
        {
          title: "适用场合",
          text: "约会 , 休闲 , 日常 , 通勤 , 校园 , 旅游 , 逛街"
        },
        { title: "版型", text: "直筒" },
        { title: "厚薄", text: "加绒加厚" },
        { title: "弹性", text: "无弹" },
        { title: "适用季节", text: "冬" },
        { title: "衣门襟", text: "单排扣" },
        { title: "袖型", text: "常规" },
        { title: "衣长", text: "常规" },
        { title: "适用人群", text: "青少年 , 青年" },
        { title: "图案", text: "纯色" },
        { title: "款式", text: "日常便服" },
        { title: "上市时间", text: "2019冬" },
        { title: "适用性别", text: "男" },
        {
          title: "材质",
          text:
            "面料：100%棉大身里：100%聚酯纤维袖里：100%聚酯纤维填充物：100%聚酯纤维"
        },
        {
          title: "洗涤说明",
          text:
            "最高洗涤温度30°C ，常规程序，不可漂白，在阴凉处悬挂晾干 ，熨斗底板最高温度110°C ，不可干洗"
        },
        { title: "商品编号", text: "11D078081027-0820" }
      ],
      color_arr: [],
      open: "展开全部",
      explain_open: "展开全部",
      list: [],
      details_img: [
        "../static/detailed/three.webp",
        "../static/detailed/four.webp",
        "../static/detailed/five.webp",
        "../static/detailed/six.webp",
        "../static/detailed/seven.webp",
        "../static/detailed/eight.webp",
        "../static/detailed/nine.webp",
        "../static/detailed/ten.webp",
        "../static/detailed/eleven.webp",
        "../static/detailed/twelve.webp",
        "../static/detailed/thirteen.webp",
        "../static/detailed/fourteen.webp",
        "../static/detailed/fifteen.webp",
        "../static/detailed/sixteen.webp"
      ],

      crat_number: "",
      swi_crat: false,
      user: "",
      color_detailed: "",
      size_detailed: "",
      title_detailed: "",
      price_detailed: "",
      src_detailed: ""
    };
  },
  methods: {
    onAddCart() {
      if (this.user) {
        if (
          this.size_detailed &&
          this.color_detailed &&
          this.user &&
          this.title_detailed &&
          this.price_detailed &&
          this.src_detailed
        ) {
          this.onCart();
          this.onLength();
        } else {
          Toast.fail("请选择码数和款式");
        }
      } else {
        this.$router.push({ path: "/land" });
      }
    },

    onCartRouter() {
      if (this.user) {
        this.$router.push({ path: "/cart" });
      } else {
        this.$router.push({ path: "/land" });
      }
    },
    onCart() {
      this.axios
        .get("/wwsc/cart/insert.php", {
          params: {
            detailed: this.color_detailed + this.size_detailed,
            user: this.user,
            title: this.title_detailed,
            price: this.price_detailed,
            src: this.src_detailed
          }
        })
        .then(res => {
          if (res.data == "加入成功") {
            Toast.success(res.data);
          } else {
            Toast.fail(res.data);
          }
        });
    },
    onImages() {
      ImagePreview(this.images);
    },
    onOpen() {
      if (this.open == "展开全部") {
        this.open = "收起";
      } else {
        this.open = "展开全部";
      }
    },
    onExplainOpen() {
      if (this.explain_open == "展开全部") {
        this.explain_open = "收起";
      } else {
        this.explain_open = "展开全部";
      }
    },
    onSizeChange(text) {
      for (let i = 0; i < this.$refs.onsize.length; i++) {
        this.$refs.onsize[i].style.color = "#000000";
        this.$refs.onsize[i].style.border = "1px solid #cccccc";
      }
      window.event.target.style.color = "#e4007f";
      window.event.target.style.border = "1px solid #e4007f";
      this.size_detailed = text;
    },
    onColorChange(index, text) {
      for (let i = 0; i < this.$refs.oncolor.length; i++) {
        this.$refs.oncolor[i].style.color = "#000000";
        this.$refs.oncolor[i].style.border = "1px solid #cccccc";
      }
      this.$refs.oncolor[index].style.color = "#e4007f";
      this.$refs.oncolor[index].style.border = "1px solid #e4007f";
      this.color_detailed = text;
    },
    onUpper() {
      this.$router.go(-1);
    },
    onScrollClass() {
      let scroll = window.event.path[1].scrollY;
      if (scroll >= 380) {
        // window.console.log(scroll);
        this.swi_title_fixed = true;
      } else {
        this.swi_title_fixed = false;
      }
    },
    onSelect() {
      this.axios
        .get("/wwsc/detailed/select.php", {
          params: {
            id: this.$route.query.id
          }
        })
        .then(res => {
          this.list = res.data;
          this.images = [
            res.data[0].src,
            "../static/male/male_two.webp",
            "../static/male/male_three.webp",
            "../static/male/male_four.webp",
            "../static/male/male_five.webp"
          ];
          this.color_arr = [
            { src: res.data[0].src, text: "活动款" },
            { src: res.data[0].src, text: "标准款" },
            { src: res.data[0].src, text: "颜色款" }
          ];
          this.title_detailed = res.data[0].title;
          this.price_detailed = res.data[0].price;
          this.src_detailed = res.data[0].src;
        });
    },
    onSelectUser() {
      this.axios.get("/wwsc/user/select.php").then(res => {
        this.user = res.data;
        window.console.log(this.user);
      });
    },
    onLength() {
      this.axios
        .get("/wwsc/cart/length.php", {
          params: {
            user: this.user
          }
        })
        .then(res => {
          window.console.log(res);
          this.crat_number = res.data;
          if (res.data >= 1) {
            this.swi_crat = true;
          } else {
            this.swi_crat = false;
          }
        });
    }
  },

  computed: {
    onOpen_arr() {
      let detailed_text_open = null;
      if (this.open == "收起") {
        return this.detailed_text;
      } else {
        detailed_text_open = [
          { title: "产地", text: "中国" },
          { title: "领型", text: "翻领" },
          {
            title: "风格",
            text:
              "日韩 , 休闲 , 时尚 , 潮流 , 百搭 , 学院风 , 牛仔系 , 青春活力 , 基础大众"
          },
          { title: "流行元素", text: "多口袋 , 纽扣 , 直下摆" }
        ];
        return detailed_text_open;
      }
    },
    onOpenExplainArr() {
      let ExplainArrLong = `唯品会展示的中间未划横线价格（显示如¥799）为唯品会销售价，该价格是交易成交价，是您最终决定是否购买商品的依据。
      唯品会展示的中间划横线价格（显示如 ¥2899）为参考价，采集自品牌专柜标价、商品吊牌价、品牌官网价格或由供应商提供的正品零售价；由于地区、时间、货币汇率等的差异及存在品牌方调价、市场行情波动、产品批次等因素，品牌专柜标价、商品吊牌价等可能会与您购物时网页显示的划线价不一致。该价格仅供您参考。
      折扣比为唯品会销售价与参考价的对比（该值四舍五入后采小数点后1位，如¥799/¥2899=0.2756=2.8折），该对比值仅供您参考，不作为结算基数。
    `;
      let ExplainArrShort = `唯品会展示的中间未划横线价格（显示如¥799）为唯品会销售价，该价格是交易成交价，是您最终决定是否购买商品的依据`;
      if (this.explain_open == "收起") {
        return ExplainArrLong;
      } else {
        return ExplainArrShort;
      }
    }
  },

  created() {
    window.addEventListener("scroll", this.onScrollClass);
    this.onSelect();
    this.onSelectUser();
    setTimeout(() => {
      if (this.user) {
        this.onLength();
      }
    }, 500);
  }
};
</script>

<style scoped>
.crat_number {
  position: relative;
}
.crat_number > span {
  width: 0.2rem;
  height: 0.2rem;
  line-height: 0.2rem;
  position: absolute;
  color: #ffffff;
  text-align: center;
  background: #de3d96;
  left: 0.6rem;
  top: 0;
  font-size: 0.12rem;
  display: block;
  border-radius: 50%;
}
.title_fixed {
  margin-top: 0 !important;
  background: #ffffff;
}
.detail_cart {
  height: 0.6rem;
  position: fixed;
  bottom: 0;
  left: 0;
  background: #ffffff;
  padding: 10px;
  font-size: 0.16rem;
  width: 100%;
  display: flex;
  box-sizing: border-box;
  justify-content: space-between;
}
.detail_cart li {
  width: 30%;
  text-align: center;
  border: 1px solid #999999;
  border-radius: 50px;
}
.detail_cart li + li {
  width: 65%;
  color: #ffffff;
  background: #ea4c88;
  line-height: 0.4rem;
  border: none;
}
.detailed_explain {
  font-size: 0.14rem;
  padding: 10px;
}
.detailed_contact p {
  font-size: 0.14rem;
  margin: 0;
}
.detailed_contact p + p {
  text-align: center;
  width: 80%;
  margin: 10px auto;
  border: 1px solid #cccccc;
  padding: 8px 0;
}
.detailed_contact p > img {
  width: 10%;
  vertical-align: middle;
}
.detailed_detailed ul {
  margin: 10px 0;
}
.detailed_detailed ul > li {
  display: flex;
  margin: 8px 0;
}
.detailed_detailed ul > li > p {
  font-size: 0.13rem;
  width: 25%;
  color: #cccccc;
}

.detailed_detailed ul > li > p + p {
  width: 70%;
  color: #777777;
}
.detailed_detailed p {
  font-size: 0.14rem;
  margin: 0;
}
.detailed_user p,
.detailed_image p {
  font-size: 0.14rem;
  margin: 0;
}
.detailed_user p + p {
  color: #777777;
  font-size: 0.12rem;
  margin: 5px 0;
}

.detailed_user p + p + ul + p {
  color: #999999;
  font-size: 0.14rem;
  text-align: center;
  padding: 12px 0;
  border-top: 1px solid #eeeeee;
  margin-top: 2px;
}

.detailed_user {
  padding-bottom: 0 !important;
}
.detailed_user ul {
  display: flex;
  height: 1.06rem;
}
.detailed_user ul li {
  width: 70%;
  font-size: 0.12rem;
}

.detailed_user ul li + li {
  width: 30%;
}

.detailed_store ul {
  display: flex;
  justify-content: space-evenly;
}

.detailed_store ul > li {
  width: 30%;
  font-size: 0.14rem;
}
.detailed_store ul > li > p {
  margin: 0;
  text-align: center;
}
.detailed_store div {
  display: flex;
  justify-content: space-between;
  margin: 10px 0;
}
.detailed_store div > p {
  font-size: 0.14rem;
  margin: 0;
  line-height: 0;
  width: 35%;
}
.detailed_store div > p + p {
  line-height: 0.31rem;
  text-align: right;
}
.detailed_store div > p + p > span {
  margin: 0 5px;
  color: #de3d96;
  border: 1px solid #de3d96;
  padding: 0px 10px;
  border-radius: 5px;
}
.detailed_store div > p > img {
  width: 50%;
  vertical-align: middle;
  margin: 0 10px;
}

.detailed_package,
.detailed_store,
.detailed_user,
.detailed_detailed,
.detailed_contact,
.detailed_image {
  padding: 10px;
  margin: 10px 0;
  background: #ffffff;
}
.detailed_package ul {
  display: flex;
  flex-wrap: wrap;
}

.detailed_package ul li {
  font-size: 0.12rem;
  width: 33%;
  padding: 5px 0;
  color: #999999;
}
.detailed_package ul li img {
  vertical-align: -0.02rem;
  width: 12%;
  margin: 0 2px;
}
.detailed_addr {
  background: #ffffff;
  padding: 5px 10px;
  margin: 10px 0;
}

.detailed_addr p {
  font-size: 0.14rem;
}
.detailed_size ul {
  display: flex;
  flex-wrap: wrap;
}
.detailed_size ul li {
  width: 28%;
  font-size: 0.12rem;
  text-align: center;
  border: 1px solid #cccccc;
  padding: 0.04rem;
  margin: 0.04rem;
}
.detailed_size {
  padding: 10px;
  background: #ffffff;
}
.detailed_size_div {
  display: flex;
  justify-content: space-between;
}
.detailed_size_div > p {
  font-size: 0.14rem;
}
.detailed_color ul li > p {
  width: 20%;
  height: 100%;
  margin: 0;
  font-size: 0.12rem;
  text-align: center;
  margin-left: 5px;
}
.detailed_color ul li > p + p {
  width: 50%;
  line-height: 0.2rem;
  margin-left: 10px;
}
.detailed_color ul li {
  width: 25%;
  height: 0.2rem;
  margin-right: 0.12rem;
  padding: 0.03rem;
  border: 1px solid #cccccc;
  display: flex;
}
.detailed_color ul {
  display: flex;
}
.detailed_color {
  font-size: 0.16rem;
  padding: 10px;
  background: #ffffff;
}
.detailed_color p {
  font-size: 0.15rem;
}
.detailed_title_p1 + p + p {
  font-size: 0.14rem;
  color: orange;
  text-align: right;
  margin: 0 10px;
}
.detailed_title_p1 + p {
  margin: 0;
  font-size: 0.16rem;
  margin: 10px 0 0 0;
}
.detailed_title {
  padding: 10px;
  position: relative;
  background: #ffffff;
}
.detailed_title_p1 > i {
  display: block;
  position: absolute;
  right: 0.1rem;
  top: 0.15rem;
  color: red;
}
.detailed_title_p1 {
  margin: 0;
  font-size: 0;
}
.detailed_title_p1 > span {
  margin-right: 5px;
  vertical-align: middle;
}
.detailed_wheel {
  width: 100%;
  height: 3.75rem;
}
.detailed_hander {
  position: relative;
}
.detailed_hander ul {
  position: fixed;
  top: 0;
  width: 100%;
  left: 0;
  z-index: 99;
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}
.detailed_hander ul li {
  height: 0.4rem;
  width: 0.4rem;
  background: rgba(256, 256, 256, 0.6);
  line-height: 0;
  border-radius: 70px;
  margin: 0 10px;
}
.detailed_hander ul li div {
  width: 0.4rem;
  height: 0.4rem;
  font-size: 0;
  line-height: 0.7rem;
  text-align: center;
}

.detailed_hander ul li + li {
  display: flex;
  width: 30%;
  background: rgba(256, 256, 256, 0.6);
  border-radius: 50px;
}
</style>
