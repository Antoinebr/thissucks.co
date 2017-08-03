<template>
  <div>
    
    <header>
      <div class="container">
  
         <img sizes="(max-width: 325px) 100vw, 325px" srcset="static/img/monkey-logo-200.png 200w,
                      static/img/monkey-logo-273.png 273w,
                      static/img/monkey-logo-325.png 325w" src="static/img/monkey-logo-325.png" class="img-center img-responsive u-mtm u-sm-mtm" alt="">
  

        <h1 class="u-txtCenter u-mts"> This sucks. </h1>
  
        <p class="u-txtCenter u-txtcatchline" v-html="content.subtitle"></p>
  
        <div class="form-group">
          <input v-model="datas.url" id="url" class="form-input block-center" placeholder="Fill in a web-address (URL)" type="url">
        </div>
  
        <a href="#" @click.prevent="sendUrl" id="submitFeedback" class="block-center button button--big u-plm u-prm u-sm-pln u-sm-prn">This service sucked!</a>
  
      </div> <!-- /container -->
    </header>
  
    <section id="why" class="why u-mtl u-mbl u-pbl u-txtCenter" v-show="why">
  
      <div class="container">
  
        <h2 class="u-mtl u-mbm u-sm-mts u-sm-mbs"> {{content.whyTitle}} </h2>
  
        <div class="row u-mtm">
  
          <div v-for="reason in content.reasons">
            <div class="col-sm-4 col-xs-6">
              <div class="block-select u-mbs" @click.prevent="selectReason(reason.categorie)">
                <img :src="'static/img/icons/'+reason.icon">
                <div class="inner">
                  <p>{{reason.title}}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- /for -->
  
        </div>
  
      </div>
      <!-- container -->
  
    </section>
  
    <section id="how" class="how u-mtl u-mbl u-pbl u-txtCenter" v-show="improve">
  
      <div class="container ">
  
        <h2 class="u-mtl u-mbm u-sm-mts u-sm-mbs"> {{content.howTitle}}</h2>
  
        <textarea class="form-input textarea-input u-pts" placeholder="1-2 sentences, please include links that might be helpful" v-model="datas.message"></textarea>
  
        <p v-show="messageValid === false" class="error u-txtCenter">Please enter at least 15 caracters</p>
  
        <a href="#" @click.prevent="sendMessage()" class="block-center button button--big u-mtm u-plm u-prm">Next</a>
  
      </div>
      <!-- container -->
  
    </section>
  
    <section id="contact" class="contact u-mtl u-mbl u-pbl u-txtCenter" v-show="contact">
  
      <div class="container">
  
        <h2 class="u-mtl u-mbm u-sm-mts u-sm-mbs"> Contact ? </h2>
  
        <facebook></facebook>
  
        <input v-model="$userInfo.firstName" class="form-input u-mbs" id="firstname" placeholder="First Name (optionnal)" type="text">
        <input v-model="$userInfo.email" class="form-input u-mbs" id="email" placeholder="Email (optionnal" type="email">
  
        <a href="#" @click.prevent="submitFeedback()" class="block-center button button--big u-plm u-prm u-sm-pln u-sm-prn u-sm-mls u-sm-mrs">Yes, please keep me in the loop.</a>
  
      </div>
      <!-- container -->
  
    </section>
  
  </div>
</template>

<script>


import facebook from './facebook.vue';

export default {
  name: 'home',
  components: {
    'facebook': facebook
  },
  data() {
    return {
      datas: {
        url: '',
        cat: '',
        message: '',
        firstname: this.$userInfo.firstName,
        email: this.$userInfo.email
      },
      // app
      content: {},
      header: {
        subtitle: ''
      },
      reasons: '',
      improve: '',
      contact: '',
      why: false,
      messageValid: true
    }
  },
  methods: {

    sendUrl: function () {

      this.why = (this.$validator.isURL(this.datas.url)) ? true : false;
      if (this.why) this.scrollTo('#why');

    },

    sendMessage: function () {

      this.messageValid = this.$validator.isLength(this.datas.message, { min: 15 }) ? true : false;

      if (this.messageValid === true) {
        this.contact = true;
        this.scrollTo('#contact');
      } else {
        this.messageValid = false;
      }

    },

    scrollTo: function (e) {
      setTimeout(() => { this.$scrollTo(e, 500) }, 100)
    },

    selectReason: function (cat) {
      this.datas.cat = cat;
      this.improve = true;
      this.scrollTo('#how');
    },

    submitFeedback: function () {

      this.datas.firstname = this.$userInfo.firstName;
      this.datas.email = this.$userInfo.email;
      console.log('$userInfo ', this.$userInfo);
      console.log(this.datas);
    },

  },
  created() {

    this.$http.get('http://localhost:9999/api/datas/').then((response) => {

      this.content = response.data;

    })

  }
}
</script> 

