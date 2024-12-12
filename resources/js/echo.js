import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

function updateNotificationsTable(eventData) {
    const tableBody = document.getElementById("notification-tb");

    const row = document.createElement('tr');

    const keyCell = document.createElement('td');
    const datetimeCell = document.createElement('td');
        
    keyCell.textContent = eventData.key;
    datetimeCell.textContent = eventData.datetime;
        
    row.appendChild(keyCell);
    row.appendChild(datetimeCell);
        
    tableBody.insertBefore(row, tableBody.firstChild);
}

window.Echo.channel("new-notifications").listen("NewNotifications", (event) => {
    updateNotificationsTable(event.data);
});
