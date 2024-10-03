<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Descripción

Este proyecto está construido con Laravel. A continuación, se detallan las herramientas y tecnologías usadas en el proyecto.

- PHP 8.2
- MySQL
- Laravel 11.9

## Instalaciones

Pasos para instalar y configurar el proyecto en tu entorno local.

1. Clona el repositorio:
```
git clone https://github.com/EdwinGarci/crud-basic-laravel.git
```

2. Instala las dependencias con Composer:
```
composer install
```

3. Actualiza el archivo .env con la configuración de tu base de datos y otros parámetros necesarios.

4. Ejecuta las migraciones de la base de datos:
```
php artisan migrate
```

5. Ejecuta los seeders para poblar la base de datos con datos de prueba
```
php artisan db:seed
```

6. Inicia el servidor de desarrollo
```
php artisan serve
```

## Decisiones tomadas
- Se utilizó migraciones y seeders para datos de prueba.
- Se implemento validaciones.
- La estructura de CRUD fue implementada para manejar productos.
- Se aplicaron buenas prácticas de manejo de excepciones para evitar caídas inesperadas de la aplicación y dar una respuesta clara al usuario.