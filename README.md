## CRUD de bolos e Interessados

Sistema criado para cadastro de bolos e registro de interesse nestes bolos.

Foi utilizado Laravel 8, Queues, Email, MySql e PHP 7.4.

Pode ser usado via docker ou direto pelo Laravel serve

## Usando Docker
- docker-compose up
- docker exec container-app composer install
- php artisan migrate
- docker exec container-app php artisan db:seed (para criar alguns registros)
- cp .env.exemple .env
- docker exec container-app php artisan queue:work --queue=email

## Usando PHP diretamente
- composer install
- cp .env.exemple .env
- php artisan migrate
- php artisan db:seed (para criar alguns registros)
- php artisan serve
- php artisan queue:work --queue=email

Para acompanhar o processamento da fila analisar o log dentro de backend/src/storage/logs/laravel.log