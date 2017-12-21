<template>
       
     
    <div class="container">

      <h2 class="u-mtl u-mbm u-sm-mts u-sm-mbs"> Contact ? </h2>

      <facebook></facebook>

      <input v-model="firstName" class="form-input u-mbs" id="firstname" placeholder="First Name (optionnal)" type="text">
      <input v-model="email" class="form-input u-mbs" id="email" placeholder="Email (optionnal" type="email">

      <a href="#" @click.prevent="submitFeedback()" class="block-center button button--big u-plm u-prm u-sm-pln u-sm-prn u-sm-mls u-sm-mrs">Yes, please keep me in the loop.</a>

    </div>
    <!-- container -->
  

</template>

<script>

import facebook from '../facebook.vue';

export default {
    name: 'ts-contact',
    components:{
      facebook : facebook,
    },
    props : ['content'],
     data(){
        return{
          firstName : userInfo.firstName,
          email : userInfo.email
        }
    },
    methods: {

      submitFeedback: function () {

        let params = new URLSearchParams();

        params.append('firstname',  this.firstName );
        params.append('email', this.email );
        params.append('message', userInfo.message );
        params.append('cat', userInfo.cat );
        params.append('url', userInfo.url );

        this.$http.post(
          'http://localhost:9999/api/record.php', params
          )
        .then((response) => {

          if (response.data.message === "success" )  this.$router.push( 'thankyou' );

        })
        .catch( (error) =>   console.log(error) ) ;

    },
  },
}
</script>

