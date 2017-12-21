<template>
  <div class="fb-login-button u-mbs" scope="public_profile,email" @click.prevent="checkLoginState()" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false">
  </div>
</template>

<script>
export default
  {
    methods: {

      scriptInit() {
        (function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) { return; }
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      },


      statusChangeCallback(response) {

        return new Promise((resolve, reject) => {

          (response.status === 'connected') ? resolve() : reject('User not connected');

        });
      },


      checkLoginState() {

        return new Promise((resolve, defer) => {

          FB.getLoginStatus(function (response) {

            (response !== "undefined") ? resolve(response) : reject('Error when checking loginstate')

          });

        });

      },


      requestUserInfo() {

        return new Promise((resolve, reject) => {

          FB.api(
            '/me',
            'GET',
            { "fields": "id,email,first_name" },
            function (response) {
              (response.id !== "undefined") ? resolve(response) : reject(response);
            }
          )

        });

      },

      showUserInfo(data) {
        console.log('[Facebook DATAS] ',data);

        userInfo.firstName = data.first_name;
        userInfo.email = data.email;

    
        document.getElementById('firstname').value = data.first_name;
        document.getElementById('email').value = data.email;

      },


      connect() {

        window.fbAsyncInit = () => {

          var theAppId = (/thissucks.co/.test(window.location.href)) ? '1094604283972594' : '1572952709405804';

          FB.init({
            appId: theAppId,
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v2.9'
          });

          FB.getLoginStatus((response) => {

            this.statusChangeCallback(response)
            .then((m) => {
              return this.checkLoginState();
            }).then((m) => {
              return this.requestUserInfo();
            }).then((m) => {
              this.showUserInfo(m);
            });

        });

        FB.AppEvents.logPageView();
      };

    }

  },
  mounted() {

    this.scriptInit();
    this.connect();

  }
}
</script>

