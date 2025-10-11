<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <?= view('App_Bridge_JS')  ?>
   
    <link rel="stylesheet" href="{{ url('/css/polaris.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/table-style.css') }}" />
    

    <script src="https://cdn.jsdelivr.net/npm/turbolinks"></script>

    <script type="text/javascript" src="{{ url('/js/jquery.min.js') }}"></script>
    
    

    <script type="text/javascript" src="{{ url('/js/script.js') }}"></script>
</head>

<body id="shopify-app-init">

    @yield('content')

    <script type="text/javascript" src="{{ url('/js/datatables.min.js') }}"></script>

</body>

</html>
