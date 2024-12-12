<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New notification</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1>Create a custom key</h1>

    <form action="{{ route('notifications.store') }}" method="POST" class="mt-6">
        @csrf
        <div class="py-6 fade">
            <input id="key" name="key" type="text" required />
            <button type="submit">Create</button>
        </div>
    </form>
</body>

</html>