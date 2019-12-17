<template>
  <div>
    <div v-if="top_swi" class="top" v-on:click="onTop">
      <img src="../../../public/static/icon/top.png" width="100%" alt />
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      scroll: 0,
      top_swi: false
    };
  },
  methods: {
    onTop() {
      let timr = setInterval(() => {
        // this.scroll = Math.ceil(this.scroll/2)-1;
        this.scroll = Math.ceil(this.scroll - 150);
        document.documentElement.scrollTop = this.scroll;
        if (document.documentElement.scrollTop <= 0) {
          clearInterval(timr);
        }
      }, 30);
    }
  },
  created() {
    window.addEventListener("scroll", () => {
      this.scroll = window.event.path[1].scrollY;
      if (this.scroll > 500) {
        this.top_swi = true;
      } else {
        this.top_swi = false;
      }
    });
  }
};
</script>


<style scoped>
.top {
  width: 0.3rem;
  height: 0.3rem;
  border-radius: 0.5rem;
  background: rgba(256, 256, 256, 0.5);
  border: 1px solid #cccccc;
  position: fixed;
  bottom: 10%;
  right: 5%;
  padding: 0.08rem;
}
.top img {
  display: block;
  opacity: 0.8;
}
</style>