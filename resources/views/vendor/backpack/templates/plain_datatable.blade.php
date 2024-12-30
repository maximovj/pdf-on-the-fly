{{--
@author Victor J.
@desc This is a template for BackPack include styles and scripts for content form
@created 28/12/2024
@updated 28/12/2024
--}}

@extends(backpack_view('templates.init_datatable'))

@section("before_styles")

@section("after_styles")

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
        <div class="my-2 mx-3">
            <table id="crudTable" ref="crudTable"
            class="bg-white table table-striped table-hover rounded shadow-xs wrap border-xs mt-2" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th><span data-toggle="tooltip" title="Seleccione tu hobbie">Hobbie</span></th>
                            <th><span data-toggle="tooltip" title="Acciones">Acciones</span></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Hobbie</th>
                            <th data-skip="on"></td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Hobbie</th>
                            <th>Acciones</td>
                        </tr>
                    </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('init_datatable')
<script>
    var dataRecords = [{ id : 0, nombre: 'unknown', hobbie: 'ninungo'},{ id : 1, nombre: 'unknown', hobbie: 'ninungo'}];

    const configDataTable = {
        id: 'crudTable',
        data: dataRecords,
        searching: true,
        columns:
        [
            { data: 'id', searchable: true },
            { data: 'nombre', searchable: true },
            { data: 'hobbie', searchable: true },
            {
                targets: -1,
                data: null,
                searchable: false,
                render: function (data, type, row) {
                    return `<div>
                        <button class="btn btn-sm btn-primary txt-white">View</button>
                        <button class="btn btn-sm btn-warning txt-white">Edit</button>
                        <button class="btn btn-sm btn-danger txt-white">Delete</button>
                    </div>`;
                    return `<select class="form-control">
                        <option disabled selected>Actions</option>
                        <option>View</option>
                        <option>Edit</option>
                        <option>Delete</option>
                    </select>`;
                }
            },
        ],
        // Configure Ajax
        /*
        processing: true,
        serverSide: true,
        ajax: {
            "url": "https://",
            "type": "POST"
        },
        */
    };

    const configCellEdit = {
        enableCellEdit: true,
        columns: [0, 1, 2],
        inputTypes: [
          {
              column:2,
              type: "list",
              options:[
                  { value: "ninguno", display: "Ninguno" },
                  { value: "deporte", display: "Hacer deporte" },
                  { value: "lectura", display: "Hacer lectura" },
              ]
          },
        ]
    }

    audfk.crud.initDataTable(configDataTable, configCellEdit);
</script>
@endsection

@section("before_scripts")

@section("after_scripts")

