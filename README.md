<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Instalación para proyecto actual de Laragon con Laravel 7.x
1. Descargar la versión reciente de [PHP 7](https://nodejs.org/dist/v14.16.0/node-v14.16.0-win-x64.zip)
2. Descargar la versión reciente de [Node.js](https://nodejs.org/en/download/) como binario
3. Descomprimir en la carpeta correspondiente de laragon en su carpeta de instalación `bin/php`, `bin/nodejs`
4. En Laragon darle clic derecho para ver el menú y seleccionar la nueva versión de PHP y Node.js
5. Abrir la terminal de laragon y correr los siguientes comandos
```
composer self-update
composer update
composer install
npm install
npm run watch
```

## Información de desarrollo
Utilizar el siguiente comando para que se llene la base de datos con información de relleno
```
php artisan migrate:fresh --seed
```
Hay tres usuarios con correos fijos que tienen el rol correspondiente.
```
user@test.com
admin@test.com
super@test.com
```
Para cualquier usuario creado inicialmente su contraseña es `asdf`
