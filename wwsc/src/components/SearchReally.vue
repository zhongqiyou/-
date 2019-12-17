<template>
  <div>
    <van-search v-model="value" placeholder="请输入搜索关键词" show-action shape="round" @search="onSearch">
      <div slot="label" class="search_left" v-on:click="onUpper"></div>
      <div slot="action" @click="onSearch">搜索</div>
    </van-search>

    <div class="search_list">
      <p style="color:#999;margin:10px 0;">热门搜索</p>
      <ul>
        <li
          v-for="(value , index) in search_list"
          :key="index"
          v-on:click="onTitleOne(value)"
        >{{value}}</li>
      </ul>
    </div>

    <div class="search_list">
      <div style="display:flex;justify-content: space-between;">
        <p style="color:#999;margin:10px 0;">历史记录</p>
        <p class="search_del" v-on:click="onSearchDelete"></p>
      </div>
      <ul>
        <li
          v-for="(value , index) in search_list_history"
          :key="index"
          v-on:click="onTitleTne(value)"
        >{{value}}</li>
      </ul>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import { Toast, Dialog } from "vant";
Vue.use(Toast).use(Dialog);

export default {
  data() {
    return {
      value: "",
      search_list: [
        "踢脚线",
        "帮宝适",
        "羽绒服",
        "跑步鞋",
        "手机",
        "牛奶",
        "洗发水",
        "电视",
        "零食",
        "ipad",
        "洗衣服",
        "洗衣液"
      ],
      search_list_history: []
    };
  },
  methods: {
    onTitleOne(value) {
      this.$router.push({ path: "/commodity", query: { text: value } });
    },
    onTitleTne(value) {
      this.$router.push({ path: "/commodity", query: { text: value } });
    },
    onSearch() {
      if (this.value) {
        this.onInsert();
      } else {
        Toast("请输入文字");
      }
    },

    onUpper() {
      this.$router.go(-1);
    },

    onSearchDelete() {
      Dialog.confirm({
        title: "确定删除所有搜索记录？",
        message: "全部内容"
      }).then(() => {
        this.onDelete();
      });
    },

    onInsert() {
      this.axios
        .get("/wwsc/search/insert.php", {
          params: {
            record: this.value
          }
        })
        .then(res => {
          window.console.log(res);
          this.$router.push({
            path: "/commodity",
            query: { text: this.value }
          });
        });
    },
    onDelete() {
      this.axios.get("/wwsc/search/delete.php").then(res => {
        window.console.log(res);
        this.search_list_history = [];
      });
    },

    onSelect() {
      this.axios.get("/wwsc/search/select.php").then(res => {
        res.data.map((value, index) => {
          window.console.log(value, index);
          this.search_list_history.push(value.text);
        });
      });
    }
  },
  created() {
    this.onSelect();
  }
};
</script>

<style scoped>
.search_left {
  width: 100%;
  height: 0.36rem;
}
.search_list {
  font-size: 0.14rem;
  margin: 10px;
}
.search_list p {
  margin: 0;
}
.search_list ul {
  display: flex;
  flex-wrap: wrap;
}

.search_list ul li {
  width: 30%;
  background: #eeeeee;
  padding: 8px 0;
  text-align: center;
  border-radius: 7px;
  font-size: 0.12rem;
  margin: 0.055rem;
}
.search_del {
  width: 0.2rem;
  height: 0.2rem;
  color: #999;
  margin: 10px 0 !important;
  background-image: url("../../public/static/icon/del.png");
  background-size: 100%;
}
</style>

<style>
.van-search__label {
  width: 0.25rem;
  height: 0.36rem;
  background-image: url("../../public/static/icon/return.png");
  background-size: 80%;
  background-repeat: no-repeat;
  background-position: 0px;
}
.van-search__content {
  padding-left: 0 !important;
}
.van-search {
  padding: 10px 0 10px 10px;
}
.van-search .van-cell {
  background: #eeeeee;
}
.van-field__left-icon .van-icon,
.van-field__right-icon .van-icon {
  width: 0.3rem;
  height: 0.28rem;
  background-image: url("../../public/static/icon/search.png");
  background-size: 100%;
  background-repeat: no-repeat;
  border: none !important;
}
.van-field__left-icon {
  padding: 0 5px !important;
}
.van-icon-search:before {
  content: "";
}
.van-field__control {
  height: 0.28rem;
}
.van-icon {
  border: none !important;
}
.van-search__action {
  font-size: 0.14rem;
}
.van-search__content {
  background: #ffffff;
}
</style>