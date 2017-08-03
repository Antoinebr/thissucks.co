<template>
    <div>
        <div class="form-group">
          <input v-model="url" id="url" class="form-input block-center" placeholder="Fill in a web-address (URL)" type="url">
        </div>
        <a href="#" @click.prevent="sendUrl" id="submitFeedback" class="block-center button button--big u-plm u-prm u-sm-pln u-sm-prn">This service sucked!</a>
    </div>
</template>

<script>
export default {
    name: 'url-form',
    methods:{

        sendUrl: function () {
            
            this.$steps.why = (this.$validator.isURL(this.url)) ? true : false;
            this.$userInfo.url = this.url;
            setTimeout(() => {this.$scrollTo('#why', 500)}, 100)
            console.log(this.$steps,this.$userInfo);
        },

    
    },
    data(){
        return{
            url : "",
            why : false,
        }
    },
}
</script>

