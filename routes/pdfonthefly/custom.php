<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Routes
// --------------------------
// This route file is loaded automatically by web.php.

/*******
* * * * * * * CUSTOM ROUTE
********/

if (! function_exists('route_home')) {
    function route_home()
    {
        Route::get('/', function () {
            return redirect('/'.config('backpack.base.route_prefix', 'admin'));
        });
    }
}

/*******
* ROUTES WITH A BACKPACK PREFIX
********/

if (! function_exists('prefix_backpack')) {
    function prefix_backpack()
    {

    }
}

/*******
* ROUTES FROM ROOT (/)
********/

if (! function_exists('root_app')) {
    function root_app()
    {
        route_home();
    }
}
