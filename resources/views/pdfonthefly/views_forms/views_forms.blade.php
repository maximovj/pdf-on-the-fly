{{-- @see https://backpackforlaravel.com/docs/4.1/base-about#add-a-custom-page-to-your-admin-panel-dynamic-page --}}
{{-- @see https://backpackforlaravel.com/docs/4.1/base-how-to#use-the-html-css-for-the-front-end-backstrap-for-front-facing-we --}}
@extends(backpack_view('templates.setup_styles_js'))

@php
$defaultBreadcrumbs = [
trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
$crud->entity_name_plural => url($crud->route),
$title ?? 'Base CRUD' => false, // <===== Custom
];

// if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
$breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@push("audfk_before_styles")
@endpush

@push("audfk_after_styles")
@endpush

@section('header')
<section class="container-fluid">
    <h2>
        <span>{!! ucfirst($title ?? 'Titulo') !!}</span>
        <small>{!! ucfirst($subtitle ?? 'Subtitulo') !!}</small>
        <a href="javascript:void(0);" onclick="fnReloadPage()" style="font-size:16px" >Reiniciar</a>

        @if ($crud->hasAccess('list'))
        <small><a href="{{ url($crud->route) }}" class="d-print-none font-sm"><i class="la la-angle-double-{{ config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left' }}"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
        @endif
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
        <form onsubmit="fnOnSubmit(event, this)">
        <div class="card my-2">
            <div class="card-body">

                {{-- Datos personales --}}
                <div class="card">
                    <div class="card-header card-header-css">
                        <h1 class="txt-h1-css">Datos personales</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label txt-label-css">Nombre(s)<span class="field-req-css"></span></label>
                                    <input type="text" name="txt_name" class="form-control" value="{{ ('txt_name') }}" required/>
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label txt-label-css">Correo electrónico<span class="field-req-css"></span></label>
                                    <input type="email" name="txt_email" class="form-control" value="{{ ('txt_email') }}" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label txt-label-css">Apellido(s)<span class="field-req-css"></span></label>
                                    <input type="text" name="txt_last_name" class="form-control" value="{{ ('txt_last_name') }}" required/>
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label txt-label-css">Empresa / GitHub / GitLab / etc.<span class="field-req-css"></span></label>
                                    <input type="text" name="txt_company" class="form-control" value="{{ ('txt_company') }}" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('pdfonthefly.views_forms.forms.'.$entry_id)
            </div>
        </div>
        <div>
            <button class="btn btn-success"><i class="la la-check-circle"></i>&nbsp;Generar PDF</button>
        </div>
        </form>
    </div>
</div>
@endsection

@push("audfk_before_scripts")
@endpush

@push("audfk_after_scripts")
<script>
    async function fnOnSubmit(event, form)
    {
        event.preventDefault();
        const descripcion = "Enviando petición, por favor, espere....";

        // Show a success notification bubble
        new Noty({
                type: "success",
                title: "Petición",
                text: `<strong>Enviando petición</strong><br>${descripcion}`
            }).show();

        Swal.fire({
            title: "Petición",
            text: `${descripcion}`,
            icon: "success",
            allowOutsideClick: false,
            showConfirmButton: false,
            showCancelButton: false,
            showCloseButton: false,
            didOpen: async () => {
                /* Code here */
                Swal.showLoading();
                setTimeout(()=>{ Swal.close(); }, 2000);
            },
            willClose: () => {
                Swal.close();
            }
        });
    }
</script>
<script>
    $(document).ready(function() {

        var changeInputs = `input, textarea, select`;
        var timer;
        var jsonData;

        function scan_fields() {
            // Create a object
            jsonData = {
                view_form_id: parseInt("{{ $entry_id }}"),
                ip: parseInt("{!! $ip !!}"),
                fields: {}
            };

            /* This code snippet is iterating over an array of input selectors, which are strings
            representing different types of input fields. For each selector, it is using
            `document.querySelectorAll` to find all input fields with names that start with the
            selector string, as well as textarea fields with names that start with the selector
            string. */
            const inputs = document.querySelectorAll(changeInputs);
            inputs.forEach((input, index) => {
                const value = input.type === 'checkbox' ? input.checked ? 'X' : '' : input.value;
                const name = input.name;
                jsonData.fields[`${name}`] = value;
            });
        }

        $(changeInputs).change(function() {
            clearTimeout(timer);
            scan_fields();

            timer = setTimeout(async function() {
                // Send the POST request to the server
                var route = '{{  route("api.v1.view-form.save_draft", ["id" => "~id~"]) }}';
                route = route.replace('~id~', parseInt("{{ $entry_id }}"));

                await fetch(route, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Origin': "{{ $origin }}",
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        credentials: 'include',
                        body: JSON.stringify(jsonData),
                    })
                    .then(response => response.json())
                    .then(async data => {
                        new Noty({
                            type: data.success ? 'success' : 'error',
                            text: data.message
                        }).show();
                    });
            }, 3000);
        });

        $('.custom-file-input').on('change', function()
        {
            // Obtiene el elemento 'label' adyacente al input
            var label = $(this).next('.custom-file-label');

            try {
                // Obtiene el nombre del archivo seleccionado
                var fileName = $(this).prop('files')[0].name;
                // Obtiene la extensión del archivo
                var fileExtension = fileName.split('.').pop().toLowerCase();
                label.text(fileName);
            } catch(err) {
                // Actualiza el texto del label con el nombre del archivo seleccionado
                label.text("Seleccione un archivo excel...");
            }

            // Remove all class
            $(this).removeClass('is-valid');
            $(this).removeClass('is-invalid');

            // Verifica si la extensión del archivo es .xlsx o .xls
            if (fileExtension === 'xlsx' || fileExtension === 'xls') {
                // Agrega la clase 'is-valid' al campo para aplicar estilos de validación exitosa
                $(this).addClass('is-valid');
            } else {
                // Si la extensión no es .xlsx o .xls, agrega la clase 'is-invalid' para indicar un error de validación
                $(this).addClass('is-invalid');
            }
        });
    });
</script>
@endpush
