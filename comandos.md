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

# Crear una BackPack Operación 
$  php artisan backpack:crud-operation ViewForm/GeneratePDF

# Eliminar cache y recargar configuración
$ php artisan optimize

# Publicar traducciones disponibles
$ php artisan vendor:publish --provider="Backpack\CRUD\BackpackServiceProvider" --tag="lang"
