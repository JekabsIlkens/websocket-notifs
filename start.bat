@echo off

set PROJECT_DIR=%~dp0

start cmd /k "cd /d %PROJECT_DIR% && php artisan serve"

start cmd /k "cd /d %PROJECT_DIR% && php artisan reverb:start --debug"

start cmd /k "cd /d %PROJECT_DIR% && npm run dev"

start http://localhost:8000/