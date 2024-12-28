<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Routes
// --------------------------
// This route file is loaded automatically by web.php.

/*******
* * * * * * * CUSTOM ROUTE
********/


function route_home()
{
    Route::get('/', function () {
        return redirect('/'.config('backpack.base.route_prefix', 'admin'));
    });
}

/*******
* ROUTES WITH A BACKPACK PREFIX
********/
function prefix_backpack()
{

}

/*******
* ROUTES FROM ROOT (/)
********/
function root_app()
{
    route_home();
}
