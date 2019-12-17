<template>
  <div>
    <div style="padding:3px;">
      <ul class="hander">
        <li
          :class="{'hander_row':class_col_row}"
          v-for="(value , index) in list"
          :key="index"
          v-on:click="onJump(value.id)"
        >
          <img :src="value.src" width="100%" alt />
          <div style="padding:8px;">
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
      <div v-if="swi_search" style="text-align:center;font-size:0.16rem;height:5.6rem;">
        <img src="../../../public/static/icon/search.png" alt />
        <p style="margin:0;color:#777777;">
          未能找到“
          <span style="color:rgb(222, 61, 150);">{{title_text}}</span>”相关商品
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    class_col_row: Boolean,
    title_text: String,
    volume_desc: Array
  },
  data() {
    return {
      list: [],
      swi_search: false
    };
  },
  methods: {
    onJump(index) {
      window.console.log(index);
      this.$router.push({ path: "/detailed", query: { id: index } });
    },
    onSelect() {
      this.axios.get("/wwsc/list/select.php").then(res => {
        this.list = res.data;
      });
    },
    onLike() {
      this.axios
        .get("/wwsc/detailed/like.php", {
          params: {
            keyword: this.title_text
          }
        })
        .then(res => {
          if (res.data.length) {
            this.list = res.data;
          } else {
            this.swi_search = true;
          }
        });
    }
  },

  created() {
    if (this.title_text) {
      this.onLike();
    } else {
      this.onSelect();
    }
  },
  watch: {
    volume_desc() {
      this.list = this.volume_desc;
    }
  }
};
</script>

<style scoped>
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
  margin: 0.05rem 0;
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




