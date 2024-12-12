<x-app-layout>
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
                    <th>Key</th>
                    <th>Datetime</th>
                </tr>
            </thead>
            <tbody id="notification-tb">
                @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $notification['key'] }}</td>
                    <td>{{ $notification['datetime'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>