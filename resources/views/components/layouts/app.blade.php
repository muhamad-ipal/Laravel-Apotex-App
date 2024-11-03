<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apotex App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <x-alert.success-alert />
    <x-alert.error-alert />

    <section>
        {{ $slot }}
    </section>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
