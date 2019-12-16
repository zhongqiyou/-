<template>
    <div>
   <van-overlay :show="show">
                        <div class="wrapper" >
                        <div class="block" @click.stop>
                          <img src="../../../public/static/icon/poster.gif" width="100%" alt="">
                             <i v-on:click="show=false"></i>
                        </div>
                        </div>
    </van-overlay>
    </div>
</template>


<script>
export default {
    data() {
        return {
            show:true
        }
    },
}
</script>

<style scopeds>
.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}

.block {
  width:3rem;
  text-align: center; 
  border-radius: 10px;
  /* background: rgba(256, 256, 256, 0.4); */
  position: relative;
}
.block>i{
    width: 0.3rem;
    height: 0.3rem;
    position:absolute;
    background:url("../../../public/static/icon/exit.png");
    background-size:100%; 
    top: 0;
    right: 0;

}
.block>img{
    margin-top: 8px;
    display: block;
    opacity: 0.8;
}
.block>p{
     background: linear-gradient(to right, red, blue);
    -webkit-background-clip: text;
    color: transparent;
    margin:10px;
    font-size:0.18rem;
    font-weight: bold;
}
</style>