<template>
       
    <div class="container ">

      <h2 class="u-mtl u-mbm u-sm-mts u-sm-mbs"> {{content.howTitle}}</h2>

      <textarea class="form-input textarea-input u-pts" placeholder="1-2 sentences, please include links that might be helpful" v-model="message"></textarea>

      <p v-show="messageValid === false" class="error u-txtCenter">Please enter at least 15 caracters</p>

      <a href="#" @click.prevent="sendMessage()" class="block-center button button--big u-mtm u-plm u-prm">Next</a>

    </div>
    <!-- container -->

</template>

<script>

import facebook from '../facebook.vue';

export default {
    name: 'ts-message',
    props : ['content'],
     data(){
        return{
          message : null,
          messageValid : null
        }
    },
    methods: {

      
    sendMessage: function () {

        this.messageValid = this.$validator.isLength(this.message, { min: 15 }) ? true : false;

        if (this.messageValid) {

          userInfo.message = this.message;

          this.$emit('stepUpdate', 'contact' );

        } 

    },




    },
}
</script>

