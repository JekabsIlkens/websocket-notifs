<x-app-layout>
    <h1>Create a custom key</h1>

    <form action="{{ route('notifications.store') }}" method="POST" class="mt-6">
        @csrf
        <div class="py-6 fade">
            <input id="key" name="key" type="text" required />
            <button type="submit">Create</button>
        </div>
    </form>
</x-app-layout>