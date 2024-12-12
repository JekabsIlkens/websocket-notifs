# Websocket notifications (proof of concept)

## Table of contents:
**[Functionality preview](#functionality-preview)**<br/>
**[Installation instructions](#installation-instructions)**<br/>

## Functionality preview:

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
