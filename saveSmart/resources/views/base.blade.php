<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <script src="https://cdn.tailwindcss.com"></script>
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                @yield('style')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>save Smart</title>
</head>
<body class="h-full text-base-content">
<div id="root" class="bg-white">
@yield( 'header')
                @yield('content')
               
             
              </div>
              @yield( 'footer')

              @yield("script")
                            </body>
</html>
              
                        