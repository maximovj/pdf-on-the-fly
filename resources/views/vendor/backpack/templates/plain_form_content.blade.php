{{--
@author Victor J.
@desc This is a template for BackPack include styles and scripts for content form
@created 28/12/2024
@updated 28/12/2024
--}}

@extends(backpack_view('template.setup_styles_js'))

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
    </h2>
</section>
@endsection

@section('content')
<!-- Default box -->
<div class="row">
    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-8">
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
                <div class="row">

                    <div class="form-group col-sm-12 mb-3 required" element="div" bp-field-wrapper="true" bp-field-name="i-text" bp-field-type="text" bp-section="crud-field">
                        <label for="i-text"><strong>Lorem ipsum dolor sit amet.</strong></label>
                        <input type="text" class="form-control" name="i-text" placeholder="Lorem ipsum dolor sit amet." />
                    </div>

                    @include('crud::fields.select2_from_array', [ 'field' => [
                        'name' => 'i-items',
                        'label' => 'Lorem ipsum dolor sit amet',
                        'type' => 'select2_from_array',
                        'options' => [
                            1 => 'Lorem ipsum dolor sit amet',
                            2 => 'Lorem ipsum dolor sit amet',
                            3 => 'Lorem ipsum dolor sit amet',
                        ],
                        'allows_null' => false,
                    ]])

                    <div class="form-group col-sm-12 mb-3 required" element="div" bp-field-wrapper="true" bp-field-name="i-checkbox" bp-field-type="checkbox" bp-section="crud-field">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="i-checkbox" id="columnIndiceCheck">
                            <label class="form-check-label" for="columnIndiceCheck">Lorem ipsum dolor sit amet, consectetur adipisicing elit</label>
                            <div id="passwordHelpBlock" style="color:#999;font-size:12px" class="form-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia repudiandae cumque error ea repellendus <b>doloribus excepturi</b>?
                            </div>
                        </div>
                    </div>
                    <div id="handleSelectPeriod" class="form-group col-sm-12 mb-3 required" element="div" bp-field-wrapper="true" bp-field-name="i-radio" bp-field-type="text" bp-section="crud-field">
                        <label for="i-radio"><strong>Lorem ipsum dolor sit amet.</strong></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="i-radio" id="anualRadio" value="anual" checked>
                            <label class="form-check-label" for="anualRadio">
                                <b>Lorem, ipsum.</b> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum dolor maiores sequi quas recusandae temporibus.
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="i-radio" id="mensualRadio" value="mensual">
                            <label class="form-check-label" for="mensualRadio">
                                <b>Lorem, ipsum.</b> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo vel laboriosam, obcaecati culpa minus dicta!
                            </label>
                        </div>
                         <div class="form-check">
                            <input class="form-check-input" type="radio" name="i-radio" id="periodoEspecificoRadio" value="periodo_especifico">
                            <label class="form-check-label" for="periodoEspecificoRadio">
                                <b>Lorem, ipsum.</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam architecto aliquid dicta magni dolor necessitatibus.
                            </label>
                        </div>
                    </div>

                    <div id="i-select" class="form-group col-sm-12 mb-3 required" element="div" bp-field-wrapper="true" bp-field-name="i-select" bp-field-type="select_from_array" bp-section="crud-field">
                        <label><strong>Lorem ipsum dolor sit amet.</strong></label>
                        <select name="ylect" class="form-control">
                            <option value="0">Lorem, ipsum.</option>
                            <option value="1">Lorem, ipsum.</option>
                            <option value="2">Lorem, ipsum.</option>
                            <option value="3">Lorem, ipsum.</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 mb-3 required" element="div" bp-field-wrapper="true" bp-field-name="closing_balance" bp-field-type="number" bp-section="crud-field">
                        <label><strong>Seleccione archivo</strong></label>
                        <div class="custom-file">
                            <input type="file" name="archivo-excel" class="custom-file-input" accept=".xlsx, .xls" required>
                            <label class="custom-file-label" for="customFileLang">Seleccione un archivo excel...</label>
                            <div class="invalid-feedback">Este archivo no tiene extensión .xlsx o .xls</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-success"><i class="la la-check-circle"></i>Guardar</button>
            <button class="btn btn-warning txt-white"><i class="la la-check-circle"></i>Actualizar</button>
            <button class="btn btn-danger"><i class="la la-check-circle"></i>Eliminar</button>
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
