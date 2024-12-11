<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Live notifications</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1>Live Notification Board</h1>

    <div class="flex items-center justify-center">
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Message</th>
                    <th>Date/Time</th>
                </tr>
            </thead>
            <tbody id="notification-tb">

            </tbody>
        </table>
    </div>
</body>

</html>