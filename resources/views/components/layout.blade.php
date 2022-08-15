<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PODCASTnote</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="js/script.js"></script>
</head>
<body>

    @include('components/header')

    <div class="min-h-screen justify-between">
        @yield('main')
    </div>

    @include('components/footer')

</body>
</html>