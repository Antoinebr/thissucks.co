<template>
        <div class="container">
  
            <img sizes="(max-width: 325px) 100vw, 325px" srcset="static/img/monkey-logo-200.png 200w,
                        static/img/monkey-logo-273.png 273w,
                        static/img/monkey-logo-325.png 325w" src="static/img/monkey-logo-325.png" class="img-center img-responsive u-mtm u-sm-mtm" alt="">
    

            <h1 class="u-txtCenter u-mts"> This sucks. </h1>
    
            <p class="u-txtCenter u-txtcatchline" v-html="content.subtitle"></p>
    
            <div class="form-group">
            <input v-model="url" id="url" class="form-input block-center" placeholder="Fill in a web-address (URL)" type="url">
            </div>
    
            <a href="#" @click.prevent="sendUrl" id="submitFeedback" class="block-center button button--big u-plm u-prm u-sm-pln u-sm-prn">This service sucked!</a>
            
            <p v-show="urlValid === false" class="error u-txtCenter">Please enter a valid url</p>

      </div> <!-- /container -->
</template>

<script>

export default {
    name: 'ts-header',
    props : ['content'],
     data(){
        return{
            url: '',
            urlValid : null
        }
    },
    methods: {
        
        sendUrl: function () {

            this.why = (this.$validator.isURL(this.url)) ? true : false;
            
            if ( ! this.why) this.urlValid = false
            
            if (this.why){

                this.$emit('stepUpdate', 'why' );
                
                this.urlValid = true;
                userInfo.url = this.url;

                //this.visibleSection.push('why');
            }
            
      } 



    },
}
</script>

<style scoped>



  
</style>