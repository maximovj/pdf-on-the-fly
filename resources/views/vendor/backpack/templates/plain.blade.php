{{--
@author Victor J.
@desc This is a template for BackPack include styles and scripts for content form
@created 28/12/2024
@updated 28/12/2024
--}}


@extends(backpack_view('blank'))

@section("before_styles")
@endsection

@section("after_styles")
@endsection

@section('header')
<section class="container-fluid">
    <h2>
        <span>{!! ucfirst($title ?? 'Titulo') !!}</span>
        <small>{!! ucfirst($subtitle ?? 'Subtitulo') !!}</small>
        <a href="javascript:void(0);" onclick="fnReloadPage()" style="font-size:16px" >Reiniciar</a>
    </h2>
</section>
@endsection


@section('content')
<!-- Default box -->
<div class="row">
    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-12">
        <div class="row mb-0">
            <div class="col-sm-6">
                <div class="d-print-none with-border">
                    <!-- insert bottom using elemnt a -->
                </div>
            </div>
            <div class="col-sm-6">
                <div id="datatable_search_stack" class="mt-sm-0 mt-2 d-print-none"></div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <!-- Code -->
            </div>
        </div>
    </div>
</div>
@endsection

@section("before_scripts")
@endsection

@section("after_scripts")
@endsection
