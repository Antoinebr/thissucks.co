<template>
  <div>
    
    <header>

      <ts-header :content="content" @stepUpdate="moveToSection($event)"></ts-header>
 
    </header>
  
    <ts-reasons :content="content"  @stepUpdate="moveToSection($event)" id="why" class="why u-mtl u-mbl u-pbl u-txtCenter" v-show="visibleSection.includes('why')"></ts-reasons>
  
    <ts-message :content="content"  @stepUpdate="moveToSection($event)"  id="how" class="how u-mtl u-mbl u-pbl u-txtCenter" v-show="visibleSection.includes('how')"></ts-message>
  
    <ts-contact @stepUpdate="moveToSection($event)" id="contact" class="contact u-mtl u-mbl u-pbl u-txtCenter" v-show="visibleSection.includes('contact')"></ts-contact>
  
  </div>
</template>

<script>

import tsHeader from './home/header.vue';

import tsReasons from './home/reasons.vue';

import tsMessage from './home/message.vue';

import tsContact from './home/contact.vue';

export default {
  name: 'home',
  components: {
    'ts-header': tsHeader,
    'ts-reasons': tsReasons,
    'ts-message' : tsMessage,
    'ts-contact' : tsContact
  },
  data() {
    return {
      content: {},
      header: {
        subtitle: ''
      },
      visibleSection : [],
      messageValid: true,
      urlValid : null,
    }
  },
  methods: {

    moveToSection: function(event){
      
      this.visibleSection.push(event)
      this.scrollTo('#'+event);

    },
    sendUrl: function () {

      this.why = (this.$validator.isURL(this.datas.url)) ? true : false;
      
      if ( ! this.why) this.urlValid = false
      
      if (this.why){

        this.scrollTo('#why');
        this.urlValid = true;

        this.visibleSection.push('why');
        
      } 

    },

    scrollTo: function (e) {
      setTimeout(() => { this.$scrollTo(e, 500) }, 100)
    },


  },
  created() {

    this.$http.get('http://localhost:9999/api/datas/').then((response) => {

      this.content = response.data;

    })

  }
}
</script> 

