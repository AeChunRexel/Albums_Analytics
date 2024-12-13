<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Analytics</title>
    <style>
                /* Define the fadeIn animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Apply the animation to the elements */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }

    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.nav')
    @include('layouts.sidebar')
    
    @include('content.container')
    

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>