<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalation
1. clone this project
2. cp .env.example to .env
3. setting databas in .env
4. run php artisan migrate
5. run php artisan key:generate
6. dont forget play video tutorial to deploy in vps [click to view](https://youtu.be/WCpU2CqsIr4?si=oMyaNwE74ABeoPQX)
7. run > npm i
8. run > npm run build
9. php artisan serve && php artisan websocket:serve


## Sample env config for localhost
```env
PUSHER_APP_ID=testingwebsocket
PUSHER_APP_KEY=qwerty
PUSHER_APP_SECRET=1234
PUSHER_HOST=localhost
PUSHER_PORT=6001
PUSHER_SCHEME=http
PUSHER_APP_CLUSTER=mt1
```
No need to purchase a pusher; you only insert an app key with a fake key string and an fake app secret with a number. 
Note: config for production, as you can see [deploy laravel websocket to vps](https://youtu.be/WCpU2CqsIr4?si=oMyaNwE74ABeoPQX)

## About Laravel Websocket

1. Laravel Version 10
2. PHP Version 8.1
3. [Laravel Websocket Version 1.14.1](https://github.com/beyondcode/laravel-websockets)
4. [Pusher Channel HTTP Version 7.2.3](https://github.com/pusher/pusher-http-php)
5. Pusher Js Version 8.3.0
6. laravel-echo version 1.15.3

## Docs
1. [Laravel Websocket](https://beyondco.de/docs/laravel-websockets/getting-started/introduction)
2. [YT Tutorial](https://www.youtube.com/watch?v=w8rj1C0fLgw)
3. [Setup SSL For Laravel Websocket](https://beyondco.de/docs/laravel-websockets/basic-usage/ssl)
