<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live notifications</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center space-x-6">
        <h1>Live notification board</h1>

        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <input id="key" name="key" type="hidden" value="" />
            <button type="submit">Random key</button>
        </form>

        <a href="{{ route('notifications.create') }}" target="_blank">Custom key</a>
    </div>

    <div class="flex items-center justify-center">
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Key</th>
                    <th>Datetime</th>
                </tr>
            </thead>
            <tbody id="notification-tb"></tbody>
        </table>
    </div>
</body>

</html>