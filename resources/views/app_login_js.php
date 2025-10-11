<script src="https://unpkg.com/@shopify/app-bridge@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@shopify/app-bridge-utils"></script>

<script type="module">

  const SESSION_TOKEN_REFRESH_INTERVAL = 60000;

  var data = document.getElementById("shopify-app-init").dataset;
  var AppBridge = window["app-bridge"];
  var createApp = AppBridge.default;
  var actions = AppBridge.actions;
  var TitleBar = actions.TitleBar;
  var Toast = actions.Toast;

  window.app = createApp({
    apiKey: '<?= env('App_Client_Id'); ?>',
    host: (window.location.search != '')?new URLSearchParams(window.location.search).get("host"):'<?=\Session::get('host')?>',
    forceRedirect: true,
  });

  TitleBar.create(window.app, {
    title: data.page,
  });
    
  function retrieveToken(app) {

    window['app-bridge-utils'].getSessionToken(app).then(token => {
      window.sessionToken = token;
    });
  }

  document.addEventListener("turbolinks:request-start", function(event) {

    Turbolinks.clearCache();

    retrieveToken(window.app);
   
    var xhr = event.data.xhr;

    xhr.setRequestHeader("Authorization", "Bearer " + window.sessionToken);
  });

  document.addEventListener("turbolinks:render", function() {

    Turbolinks.clearCache();

    /* document.querySelectorAll("form").forEach(function(element) {

      element.addEventListener("ajax:beforeSend", function(event) {
        
        alert("form");

        const xhr = event.detail[0];
        xhr.setRequestHeader("Authorization", "Bearer " + window.sessionToken);
      });
    }); */
  });

  document.addEventListener("DOMContentLoaded", async () => {
    
    Turbolinks.clearCache();

    var isInitialRedirect = true;
    
    keepRetrievingToken(window.app);

    redirectThroughTurbolinks(isInitialRedirect);

    document.addEventListener("turbolinks:load", function(event) {

      redirectThroughTurbolinks();
    });

    function redirectThroughTurbolinks(isInitialRedirect = false) {

      /* console.log("redirectThroughTurbolinks"); */
      
      var data = document.getElementById("shopify-app-init").dataset;
      var validLoadPath = data && data.loadPath;
      var shouldRedirect = false;

      window['app-bridge-utils'].getSessionToken(window.app).then(token => {

        /* console.log("getSessionToken"); */

        window.sessionToken = token;

        switch (isInitialRedirect) {
          case true:
            shouldRedirect = validLoadPath;
            break;
          case false:
            shouldRedirect = validLoadPath && data.loadPath !== "<?= url("/dashboard") ?>";
            break;
        }
        if (shouldRedirect) Turbolinks.visit(data.loadPath);
      });
    }

    function keepRetrievingToken(app) {
      setInterval(() => {
        retrieveToken(app);
      }, SESSION_TOKEN_REFRESH_INTERVAL);
    }
  });

  /* FOR SUCCESS MESSAGE POPUP */
  window.flashNotice = function(message){

      Toast.create(window.app, {
          message: message,
          duration: 5000,
      }).dispatch(Toast.Action.SHOW);
  };

  /* FOR ERROR MESSAGE POPUP */
  window.flashError = function(message){
      Toast.create(window.app, {
          isError: true,
          duration: 5000,
          message: message,
      }).dispatch(Toast.Action.SHOW);
  };

  <?php if (env("APP_ENV") == "local") { ?>

    var KundalisLink = actions.AppLink.create(app, {
      label: 'Kundalis',
      destination:`/my_kundali/public/kundalis`,
    });
    
    var KundalipricingLink = actions.AppLink.create(app, {
      label: 'Kundali Pricing',
      destination: `/my_kundali/public/kundali-prices`,
    });

    var ApiKeysLink = actions.AppLink.create(app, {
      label: 'Account Settings',
      destination: `/my_kundali/public/api-keys`,
    });

    var pricingLink = actions.AppLink.create(app, {
      label: 'App Pricing',
      destination: `/my_kundali/public/pricing`,
    });

  <?php } else { ?>

    var KundalisLink = actions.AppLink.create(app, {
      label: 'Kundalis',
      destination:`/kundalis`,
    });
    
    var KundalipricingLink = actions.AppLink.create(app, {
      label: 'Kundali Pricing',
      destination: `/kundali-prices`,
    });

    var ApiKeysLink = actions.AppLink.create(app, {
      label: 'Account Settings',
      destination: `/api-keys`,
    });
    
    var pricingLink = actions.AppLink.create(app, {
      label: 'App Pricing',
      destination: `/pricing`,
    });

  <?php } ?>
 
  var menuArr = [KundalisLink, KundalipricingLink, ApiKeysLink, pricingLink]; 
   
  /* CREATE A NavigationMenu WITH THE SETTINGS LINK ACTIVE */
  var channelMenu = actions.NavigationMenu.create(app, {
    items: menuArr,
  }); 
</script>