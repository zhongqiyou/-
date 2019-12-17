<template>
  <div style="background:#eeeeee;">
    <div class="position">
      <van-search
        v-model="value"
        placeholder="请输入搜索关键词"
        show-action
        shape="round"
        @search="onSearch"
      >
        <div slot="label" class="search_left" v-on:click="onUpper"></div>
        <div slot="action" @click="onSearch">搜索</div>
      </van-search>
    </div>

    <div style="margin-top:0.58rem;  margin-left:2px; margin-right:2px; ">
      <van-swipe-cell :right-width="width" v-for="(value , index) in list" :key="index">
        <ul class="hander">
          <li class="hander_row">
            <img :src="value.src" width="100%" alt />
            <div style="padding:8px;width:100%;">
              <dl>
                <dd>
                  <span
                    style="background:#de3d96;color:#fff;border-radius:5px;font-size:0.1rem;padding:2px"
                  >疯抢价</span>
                  <span style="color:#000000;font-weight:bold;">￥{{value.price}}</span>
                  <span class="price">{{value.primary}}</span>
                </dd>
              </dl>

              <p class="title">{{value.title}}</p>
              <dl>
                <dd style="color:orange;font-size:0.10rem;">
                  月销
                  <span>{{value.volume}}</span>
                </dd>
                <dd style="color:red;font-size:0.10rem;">
                  <span>{{value.discount}}</span>
                  <span>折</span>
                </dd>
              </dl>
            </div>
          </li>
        </ul>

        <template slot="right">
          <van-button square class="btn" type="primary" v-on:click="onEdit(value.id)" text="编辑" />
          <van-button square class="btn" type="danger" v-on:click="onDel(value.id)" text="删除" />
        </template>
      </van-swipe-cell>
    </div>

    <div class="add" v-on:click="onAdd">
      <img src="../../public/static/icon/add.png" width="100%" alt />
    </div>
    <Top></Top>
  </div>
</template>

<script>
import Vue from "vue";
import { Dialog, Toast } from "vant";
Vue.use(Dialog).use(Toast);
import Top from "@/components/small_components/Top";

export default {
  data() {
    return {
      value: "",
      list: [],
      width: 120
    };
  },
  methods: {
    onEdit(id) {
      this.$router.push({ path: "/commodityedit", query: { id: id } });
    },
    onDel(id) {
      this.onDelete(id);
    },
    onSearch() {
      this.onKey();
    },
    onUpper() {
      this.$router.go(-1);
    },
    onSelect() {
      this.axios.get("/wwsc/list/select.php").then(res => {
        this.list = res.data;
      });
    },
    onKey() {
      this.axios
        .get("/wwsc/detailed/like.php", {
          params: {
            keyword: this.value
          }
        })
        .then(res => {
          this.list = res.data;
        });
    },
    onDelete(id) {
      this.axios
        .get("/wwsc/detailed/delete.php", {
          params: {
            id: id
          }
        })
        .then(res => {
          Toast.success(res.data);
          this.onSelect();
        });
    },
    onAdd() {
      this.$router.push({ path: "/commodityadd" });
    }
  },
  components: {
    Top
  },

  created() {
    this.onSelect();
  }
};
</script>

<style scoped>
.add {
  width: 0.5rem;
  height: 0.5rem;
  border-radius: 1rem;
  background: url("../../public/static/male/male_four.webp");
  background-size: 135%;
  background-position: -20px -2px;
  margin: 5px auto;
  opacity: 0.9;
  padding: 10px;
}
.add img {
  display: block;
  opacity: 0.4;
}
.position {
  width: 100%;
  height: 0.58rem;
  position: fixed;
  z-index: 99999;
  top: 0;
  left: 0;
}
.btn {
  display: block;
  width: 120px;
  height: 50%;
}
.search_left {
  width: 100%;
  height: 0.36rem;
}
.hander_row {
  display: flex;
  width: 100% !important;
}
.hander_row img {
  width: 30%;
}
.hander_row div p {
  margin: 10px;
}
.hander_row div dl {
  margin: 10px !important;
}
.hander_row div dl + dl {
  margin: 23px 10px 0 10px !important;
}
.hander {
  width: 100%;
  display: flex;
  font-size: 0;
  flex-wrap: wrap;
  justify-content: space-between;
}
.hander li {
  width: 48%;
  margin: 0.03rem;
  background: #fff;
  border-radius: 5px;
  overflow: hidden;
}

.hander li dl {
  display: flex;
  font-size: 0.15rem;
  margin: 0;
  justify-content: space-between;
  margin: 3px 0;
}
.hander li dl dd {
  margin: 0;
}
.price {
  color: #cccccc;
  font-size: 0.1rem;
  text-decoration: line-through;
}
.title {
  font-size: 0.1rem;
  line-height: 0.15rem;
  margin: 0;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  margin-top: 5px;
  color: #777777;
}
</style>
<style>
.van-swipe-cell__right {
  font-size: 0;
}
</style>