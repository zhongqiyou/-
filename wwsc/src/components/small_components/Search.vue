<template>
  <div class="hander_search">
    <ul class="search">
      <router-link to="/class" class="router_width">
        <li style="width:100%;">
          <img
            src="../../../public/static/icon/menu.png"
            width="40%"
            style="margin-top:0.1rem;"
            alt
          />
        </li>
      </router-link>

      <router-link to="/searchReally" style="width:60%">
        <li class="search_li" style>
          <img src="../../../public/static/icon/search.png" width="12%" alt />
          <p>森马男装</p>
        </li>
      </router-link>

      <router-link to="/searchReally" class="router_width">
        <li style="line-height:0.5rem; width:100%;">搜索</li>
      </router-link>
    </ul>
  </div>
</template>


<script>
export default {};
</script>

<style scoped>
.router_width {
  width: 20%;
}
.search {
  display: flex;
  height: 0.5rem;
  width: 100%;
  background-image: url("../../../public/static/back.jpg");
}
.search li {
  width: 20%;
  height: 100%;
  font-size: 0.16rem;
  text-align: center;
  color: #eeeeee;
}

.hander_search {
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
}
.search_li {
  border: 1px solid #ccc;
  width: 100% !important;
  background: #eeeeee;
  height: 60% !important;
  margin-top: 0.1rem;
  border-radius: 5px;
  text-align: left !important;
  display: flex;
}
.search_li > p {
  color: #cccccc;
  margin: 0;
  line-height: 0.32rem;
}
</style>