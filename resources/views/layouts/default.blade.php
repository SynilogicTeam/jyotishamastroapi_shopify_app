<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>Dashboard</title>
  
  	<?= view('App_Bridge_JS')  ?>
   
    <link rel="stylesheet" href="{{ url('/css/polaris.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/turbolinks"></script>

    <script type="text/javascript" src="{{ url('/js/jquery.min.js') }}"></script>
    
    

    <script type="text/javascript" src="{{ url('/js/script.js') }}"></script>
</head>

<body id="shopify-app-init">

    <ui-nav-menu>
      <a href="{{ url('/kundalis') }}">Kundali Orders</a>
      <a href="{{ url('/api-keys') }}">Account Settings</a>
      <a href="{{ url('/kundali-prices') }}">Kundali Prices</a>
      <a href="{{ url('/pricing') }}">App Pricing</a>
  </ui-nav-menu>
  
    @yield('content')

</body>

</html>
