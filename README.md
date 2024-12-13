# WebSocket notifications (proof of concept)

## Table of contents:
**[Functionality preview](#functionality-preview)**<br/>
**[Proof of concept analysis](#proof-of-concept-analysis)**<br/>
**[Installation instructions](#installation-instructions)**<br/>

## Functionality preview:

Using an incognito tab (on the right side), I am simulating actions on the server. The WebSocket listens for these events and displays them in real time (on the left side).
In Devtools/Network/WS we can see a successful subscription to the new-notifications channel and the contents of a received event.
<table>
  <tr>
    <td><img src='https://raw.githubusercontent.com/JekabsIlkens/websocket-notifs/master/public/images/ws_preview.gif' alt='websocket_preview' width="500px"/></td>
    <td><img src='https://raw.githubusercontent.com/JekabsIlkens/websocket-notifs/master/public/images/custom_key.png' alt='websocket_custom' width="600px"/></td>
  </tr>
  <tr>
    <td colspan="2"><img src='https://raw.githubusercontent.com/JekabsIlkens/websocket-notifs/master/public/images/ws_devtools.png' alt='websocket_devtools' width="1200px"/></td>
  </tr>
</table>

## Proof of concept analysis:

#### Problem Statement
The project addresses the need for real-time data delivery from the server to the browser.
Traditional HTTP-based communication is not sufficient for instantaneous updates as it relies on request-response cycles.
Leveraging WebSockets we can enable seamless, bi-directional communication, which allows the server to push data directly to the client.
This is ideal for applications requiring live updates, such as live feeds, or real-time notifications. <br/>

#### Success Metrics
Demonstrate a functional client-server WebSocket notification system with a simple single channel and event implementation. <br/>
- Clients receive real-time updates pushed from the server.
- Data is displayed accurately and instantaneously in the browser.

#### Implementation
- **Server Side**: Implemented using Laravel 11 and Laravel Reverb to broadcast data to connected clients via WebSockets.
- **Client Side**: Implemented using Laravel Echo and JavaScript to listen for events, and display the received data.
- **Data Storage**: Implemented using Redis for easy and simple session and new notification storage.

#### Potential Improvements

**The current setup** is directly firing an event after inserting data into Redis. 
This ensures that the WebSocket is triggered immediately after the data is added.
Simple implementation with an immediate response to the insert, so users see notifications 
as soon as the data is inserted, but slightly less scalable in case of heavy traffic. <br/>

**Alternative approach** would be to listen for changes in Redis through Pub/Sub and trigger 
an event when new data is inserted. This approach is more scalable, but introduces more complexity. <br/>

Considering that this is a simple proof of concept to demonstrate real-time data via WebSockets,
the current implementation is simple and sufficient for the goal.
When implementing into a real system we would naturally anticipate heavy traffic and the need
for better decoupling of the event system with Redis Pub/Sub which would allow events to be triggered asynchronously.

## Installation instructions:

### Ensure you have the following tools:
- PHP (version 8.2 or later)
- Composer (for PHP dependencies)
- Node/npm (for frontend dependencies)
- Redis (for a local Redis server)

### Clone the repository on your local machine & step into the project directory:
```shell
git clone https://github.com/JekabsIlkens/websocket-notifs.git

cd websocket-notifs
```

### Open .env.example & add your Redis server credentials:
```shell
REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_DB=0
REDIS_CACHE_DB=1
REDIS_NOTIFICATIONS_DB=2
```

### Run the setup script to build the project:
```shell
setup.bat
```

### Run the start script to launch the project:
```shell
start.bat
```

### For Linux & MacOS, please execute these commands manually:
```shell
copy .env.example .env              # Creates the environment configuration file
composer install                    # Installs the required PHP dependencies
npm install                         # Installs the required front-end dependencies
npm run build                       # Builds the required front-end assets
php artisan key:generate            # Generates the application key

php artisan serve                   # Starts the PHP development server
php artisan reverb:start            # Starts the Reverb development server
npm run dev                         # Starts the Vite development server
```
