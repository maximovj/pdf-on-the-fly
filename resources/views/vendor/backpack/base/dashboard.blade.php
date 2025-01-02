@extends(backpack_view('blank'))

@section('content')
@php
    Widget::add
    ([
        'type'        => 'jumbotron',
        'heading'     => '¡Bienvenido!',
        'content'     => 'Use la barra lateral a la izquierda para navegar entre las opciones. <br/> Este sistema sirve para generar PDF en línea.',
    ]);
@endphp


@php
    Widget::add([
        'type'       => 'chart',
        'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,
        // OPTIONALS
        'class'   => 'card mb-2',
        'wrapper' => ['class'=> 'col-md-6'] ,
        'content' => [
            'header' => 'Archivos generados',
            'body'   => 'Esta gráfica muestra los archivos generados del día de hoy<br><br>',
        ],
    ]);
@endphp
@endsection
