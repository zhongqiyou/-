<template>
  <div>
    <ul class="land_hander">
      <li>
        <p class="land_hander_back" v-on:click="onUpper"></p>
      </li>
      <li style="flex-grow: 1.2;">编辑收货地址</li>
    </ul>
    <van-address-edit
      :area-list="areaList"
      show-postal
      show-delete
      show-set-default
      :area-columns-placeholder="['请选择', '请选择', '请选择']"
      @save="onSave"
      @delete="onDelete"
      :address-info="AddressInfo"
    />
  </div>
</template>

<script>
import Vue from "vue";
import { Dialog, Toast, Area } from "vant";
Vue.use(Dialog)
  .use(Toast)
  .use(Area);
import addr from "../json/addr.json";
export default {
  data() {
    return {
      areaList: addr,
      AddressInfo: {}
    };
  },

  methods: {
    onSave(save) {
      window.console.log(save);
      let saveDate = {
        id: save.id,
        name: save.name,
        tel: save.tel,
        user: save.user,
        addressDetail: save.addressDetail,
        city: save.city,
        county: save.county,
        postalCode: save.postalCode,
        province: save.province,
        address: save.province + save.city + save.county + save.addressDetail,
        isDefault: save.isDefault
      };

      if (save.isDefault) {
        this.onUpdateBool(save.isDefault, save.user);
      }
      setTimeout(() => {
        window.console.log(save.isDefault);
        this.onUpdate(saveDate);
      }, 1000);
    },
    onDelete() {
      this.onDeleteImportant();
    },
    onUpper() {
      this.$router.go(-1);
    },
    onSelect() {
      this.axios
        .get("/wwsc/addr/select_detailed.php", {
          params: {
            user: this.$route.query.user,
            id: this.$route.query.id
          }
        })
        .then(res => {
          this.AddressInfo = res.data[0];
        });
    },
    onDeleteImportant() {
      this.axios
        .get("/wwsc/addr/delete.php", {
          params: {
            id: this.$route.query.id
          }
        })
        .then(res => {
          if (res.data == "删除成功") {
            Toast.success(res.data);
            setTimeout(() => {
              this.$router.go(-1);
            }, 2000);
          }
        });
    },
    onUpdate(data) {
      this.axios
        .get("/wwsc/addr/update.php", {
          params: data
        })
        .then(res => {
          if (res.data == "修改成功") {
            Toast.success(res.data);
            setTimeout(() => {
              this.$router.go(-1);
            }, 2000);
          }
        });
    },
    onUpdateBool(data, user) {
      this.axios
        .get("/wwsc/addr/update_default.php", {
          params: {
            user: user,
            isDefault: !data
          }
        })
        .then(res => {
          window.console.log(res);
        });
    }
  },
  created() {
    this.onSelect();
  }
};
</script>

<style scoped>
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