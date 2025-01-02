@extends(backpack_view('blank'))

@section('content')
@php
    Widget::add()
    ->type('div')
    ->class('row mb-2')
    ->content([
        [
            'type'        => 'jumbotron',
            'wrapper' => ['class'=> 'col-12'] ,
            'heading'     => '¡Bienvenido!',
            'content'     => 'Use la barra lateral a la izquierda para navegar entre las opciones. <br/> Este sistema sirve para generar PDF en línea.',
        ]
    ]);
@endphp

@php
    Widget::add()
    ->type('div')
    ->class('row mb-2')
    ->content([
        [
            'type'       => 'chart',
            'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,
            // OPTIONALS
            'class'   => 'card mb-2',
            'wrapper' => ['class'=> 'col-md-6'] ,
            'content' => [
                'header' => 'PDFOnTheFly Gráfica',
                'body'   => 'Esta gráfica muestra los archivos generados a PDF de manera correcta<br><br>',
            ],
        ],
        [
            'type'       => 'chart',
            'controller' => \App\Http\Controllers\Admin\Charts\Dashboard\CountVersionsChartController::class,
            // OPTIONALS
            'class'   => 'card mb-2',
            'wrapper' => ['class'=> 'col-md-6'] ,
            'content' => [
                'header' => 'PDFOnTheFly Gráfica',
                'body'   => 'Esta gráfica muestra cuantos cambios se a realizado en cada archivo<br><br>',
            ],
        ]
    ]);
@endphp
@endsection
