<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New notification</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1>Create a new notification</h1>

    <form action="{{ route('notifications.store') }}" method="POST">
        @csrf

        <div>
            <label for="message">Message:</label>
            <input id="message" name="message" type="text" required />
        </div>

        <button type="submit">Submit</button>
    </form>
</body>

</html>