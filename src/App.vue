<template>
  
  <div id="app" class="clearfix bg-blue banner-full-screen u-pbl" style="background-image:url('static/img/wallpaper.png" >
    <link rel="stylesheet" href="./static/css/app.css">

    <main>
      <router-view></router-view>
    </main>

  </div>
</template>

<script>
export default {
  name: 'app',
  data(){
    return {
      reasons : {}
    } 
  }
}
</script>

