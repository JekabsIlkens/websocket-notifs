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

let notificationEvents = [];

window.Echo.channel("new-notifications")
    .listen("NewNotifications", (event) => {
        notificationEvents.push(event.data);
        updateNotificationsTable(notificationEvents);
    });

function updateNotificationsTable(events) {
    const tableBody = document.getElementById("notification-tb");
    tableBody.innerHTML = '';

    events.forEach(event => {
        const row = document.createElement('tr');

        const keyCell = document.createElement('td');
        const datetimeCell = document.createElement('td');
        
        keyCell.textContent = event.key;
        datetimeCell.textContent = event.datetime;
        
        row.appendChild(keyCell);
        row.appendChild(datetimeCell);
        
        tableBody.appendChild(row);
    });
}
