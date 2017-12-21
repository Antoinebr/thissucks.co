<template>
       
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

</template>

<script>

export default {
    name: 'ts-reasons',
    props : ['content'],
     data(){
        return{
  
        }
    },
    methods: {

      
        selectReason: function (cat) {

            userInfo.cat = cat;
            
            this.$emit('stepUpdate', 'how' );
 
        },

    },
}
</script>

