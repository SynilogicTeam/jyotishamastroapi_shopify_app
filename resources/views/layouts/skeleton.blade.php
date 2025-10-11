<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  
  <?= view('App_Bridge_JS')  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/turbolinks"></script>

    <link rel="stylesheet" href="{{ url('/css/polaris.css') }}" />
        
    <script type="text/javascript" src="{{ url('/js/jquery.min.js') }}"></script>
    
    
</head>

<body data-load-path="{{ url("/dashboard?host=".Request::get('host')) }}" id="shopify-app-init" data-api-key="<?= env('App_Client_Id'); ?>" data-debug="true" style="background-color: #f4f6f8;">


    @yield('content')

</body>

</html>
