<head>
    <base href="../../">
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ \DB::table('system_settings')->first()->application_name; }} - @yield('title') </title>
    <meta name="description" content="Page with empty content" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://exilednoname.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/backend/mix/css/app.css">
    @stack('head')
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/favicon.png" />
</head>