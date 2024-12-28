# Instalación
$ composer require backpack/crud:"4.1.*"
$ composer require --dev backpack/generators
$ php artisan backpack:install
$ composer require backpack/crud:"4.1.x-dev as 4.0.99"
php artisan vendor:publish --provider="Backpack\CRUD\BackpackServiceProvider" --tag="minimum"
$ php artisan migrate
$ php artisan backpack:publish-middleware

# Publicar vistas
$ php artisan backpack:publish base/inc/menu

# Eliminar cache y recargar configuración
$ php artisan optimize