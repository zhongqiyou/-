<template>
  <div style="background:#eeeeee;">
    <div class="comm_hander">
      <SearchList :title_input="$route.params.text"></SearchList>
      <ul>
        <li
          ref="hander_title"
          v-on:click="onTitleColorChange('0')"
          class="van-ellipsis"
          style="color:rgb(222, 61, 150);"
        >全部</li>
        <li v-on:click="onTitleColorChange('1')">
          <van-dropdown-menu class="demo">
            <van-dropdown-item
              v-model="value1"
              title="销量"
              :options="option1"
              v-on:change="onSales"
            />
          </van-dropdown-menu>
        </li>
        <li ref="hander_title" v-on:click="onTitleColorChange('2')" class="van-ellipsis">折扣</li>
        <li v-on:click="onTitleColorChange('3')">
          <van-dropdown-menu class="demo">
            <van-dropdown-item
              v-model="value2"
              title="价格"
              :options="option2"
              v-on:change="onPrice"
            />
          </van-dropdown-menu>
        </li>

        <li v-on:click="onIconChange">
          <img src="../../public/static/icon/class_row.png" ref="icon_img" width="80%" alt />
        </li>
      </ul>
      <Top></Top>
    </div>

    <div style="margin-top:0.94rem">
      <List
        :class_col_row="class_col_row"
        :title_text="$route.query.text"
        :volume_desc="volume_desc"
      ></List>
    </div>
  </div>
</template>

<script>
import List from "@/components/small_components/List";
import SearchList from "./small_components/SearchList";
import Top from "@/components/small_components/Top";

export default {
  data() {
    return {
      class_col_row: false,
      swi_col_row: true,
      hander_text_color_change: null,
      volume_desc: [],

      value1: 0,
      option1: [{ text: "销量降序", value: 0 }, { text: "销量升序", value: 1 }],
      value2: 0,
      option2: [{ text: "价格降序", value: 0 }, { text: "价格升序", value: 1 }]
    };
  },
  methods: {
    onSales() {
      if (this.value1 == 0) {
        this.onVolume("/wwsc/detailed/like_desc_volume.php");
      } else if (this.value1 == 1) {
        this.onVolume("/wwsc/detailed/like_asc_volume.php");
      }
    },
    onPrice() {
      if (this.value2 == 0) {
        this.onVolume("/wwsc/detailed/like_desc_price.php");
      } else if (this.value2 == 1) {
        this.onVolume("/wwsc/detailed/like_asc_price.php");
      }
    },
    onIconChange() {
      if (this.swi_col_row) {
        this.$refs.icon_img.src = "../static/icon/class_col.png";
        this.swi_col_row = false;
        this.class_col_row = true;
      } else {
        this.$refs.icon_img.src = "../static/icon/class_row.png";
        this.swi_col_row = true;
        this.class_col_row = false;
      }
    },
    onTitleColorChange(index) {
      this.hander_text_color_change = document.querySelectorAll(
        ".van-ellipsis"
      );
      for (let i = 0; i < this.hander_text_color_change.length; i++) {
        this.hander_text_color_change[i].style.color = "#000000";
      }
      this.hander_text_color_change[index].style.color = "rgb(222, 61, 150)";
      if (index == 0) {
        this.onVolume("/wwsc/detailed/like.php");
      } else if (index == 1) {
        if (this.value1 == 0) {
          this.onVolume("/wwsc/detailed/like_desc_volume.php");
        }
      } else if (index == 2) {
        this.onVolume("/wwsc/detailed/like_asc_discount.php");
      } else if (index == 3) {
        if (this.value2 == 0) {
          this.onVolume("/wwsc/detailed/like_desc_price.php");
        }
      }
    },

    onVolume(url) {
      this.axios
        .get(url, {
          params: {
            keyword: this.$route.query.text
          }
        })
        .then(res => {
          this.volume_desc = res.data;
        });
    }
  },
  components: {
    List,
    SearchList,
    Top
  },
  created() {
    // window.console.log(this.$route.query.text);
  }
};
</script>

<style scoped>
.demo {
  height: auto !important;
}

.comm_hander ul {
  display: flex;
  font-size: 0.15rem;
}
.comm_hander ul li {
  flex: 3;
  text-align: center;
  line-height: 0.23rem;
}
.comm_hander ul li + li + li + li + li {
  flex: 1;
}
.comm_hander ul li + li + li + li + li > img {
  vertical-align: middle;
}
.comm_hander {
  width: 100%;
  padding: 10px;
  background: #fff;
  position: fixed;
  box-sizing: border-box;
  top: 0.5rem;
  left: 0;
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
</style>

<style>
.van-dropdown-menu__title {
  font-size: 0.15rem;
  line-height: 0.23rem;
}
</style>





