<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{$title ?? 'Presto.it'}}</title>

    <!-- animate on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4ace0a1b76.js" crossorigin="anonymous"></script>

    @livewireStyles()
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    <x-navbar />

    {{$slot}}

    <x-footer />
    

    @livewireScripts()

    <!-- animate on scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>



</body>
</html>