@extends(backpack_view('blank'))

@section('content')
@php
    Widget::add()
    ->to('before_content')
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
    ->to('before_content')
    ->type('div')
    ->class('row mb-2')
    ->content([
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-type-2 mb-2',
            'value'       => \App\Models\FilePDF::count(),
            'description' => 'Archivos PDF',
            'progress'    => 0, // integer
            'hint'        => '<a href="'.route('file-pdf.index').'" class="txt-slate-dark a-link">Archivos PDF de tipo formulario</a>',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-type-4 mb-2',
            'value'       => \App\Models\ViewForm::count()  ,
            'description' => 'Formularios',
            'progress'    => 0, // integer
            'hint'        => '<a href="'.route('view-form.index').'" class="txt-slate-dark a-link">Formularios enlazado con un archivo PDF</a>',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-type-5 mb-2',
            'value'       => App\Models\GeneratePDF::countGenerated(),
            'description' => 'Generado',
            'progress'    => 0, // integer
            'hint'        => '<a href="'.route('generate-pdf.index', ['generated' => 'true']).'" class="txt-slate-dark a-link">Formulario generado en PDF</a>',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card txt-black bg-slate mb-2',
            'value'       => App\Models\GeneratePDF::countDraft(),
            'description' => 'Borrador',
            'progress'    => 0, // integer
            'hint'        =>  '<a href="'.route('generate-pdf.index', ['draft' => 'true']).'" class="txt-slate-dark a-link">Formulario guardado como borrador</a>',
        ],
    ]);
@endphp

@php
    Widget::add()
    ->to('before_content')
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
