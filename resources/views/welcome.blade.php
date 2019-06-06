<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Slides 🚀</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="app">    
            <app></app>        
        </div>
        <script src="{{ URL::to('/') }}/js/app.js"></script>
        
    </body>
</html>
