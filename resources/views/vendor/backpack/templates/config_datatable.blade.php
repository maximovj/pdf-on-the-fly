{{--
@author Victor J.
@desc This is a template for BackPack include styles and scripts for content form
@created 28/12/2024
@updated 28/12/2024
--}}

<!--- Configuration AUDFK CRUD TABLE  --->
<script>
    window.audfk = {}
    window.audfk.crud = {
        initDataTable: function(configDataTable = {}, configCellEdit = {} ){
            // Get id for DataTable JS render
            const idDataTable = configDataTable.id ?
                configDataTable.id : 'crudTable';

            // Get config DataTableJs
            audfk.crud.configDataTable = {
                ...audfk.crud.configDataTable,
                ...configDataTable
            };

            // Get config CellEdit
            audfk.crud.configCellEdit = {
                ...audfk.crud.configCellEdit,
                ...configCellEdit
            };

            // Create DataTableJs
            audfk.crud.table = $('#' + idDataTable).DataTable(audfk.crud.configDataTable);

            if( audfk.crud.configCellEdit.enableCellEdit ){
                // Configure MakeCellsEditable
                audfk.crud.table.MakeCellsEditable({
                    ...audfk.crud.configCellEdit,
                    ...configCellEdit,
                });
            }

            //audfk.crud.table.draw();
            $.fn.dataTable.ext.errMode = 'none';
        },
        configDataTable: {
            id: 'crudTable',
            language: {
                url: '{{ asset("json/datatables.spanish.json") }}',
            },
            enableCellEdit: true,
            columnsCellEdit: [0],
            searching: true,
            autoWidth: false,
            info:true,
            paging: true,
            pagingType: "full_numbers",
            lengthMenu: [
                [10, 25, 50, 100, 500, 1000, -1],
                [10, 25, 50, 100, 500, 1000, "Todos"]
            ],
            pageLength: 10,
            columnDefs: [
                {className: "d-texttext-center", targets: "_all"},
                {style: {"white-space": "normal"}, targets: "_all"},
            ],
            dom:
                "<'row hidden'<'col-sm-6'i><'col-sm-6 d-print-none'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-2 d-print-none '<'col-sm-12 col-md-4'l><'col-sm-0 col-md-4 text-center'B><'col-sm-12 col-md-4 'p>>",
            language: {
                "emptyTable":     "{{ trans('backpack::crud.emptyTable') }}",
                "info":           "{{ trans('backpack::crud.info') }}",
                "infoEmpty":      "Registro no encontrado de un total de _MAX_ registros",
                "infoFiltered":   "{{ trans('backpack::crud.infoFiltered') }}",
                "infoPostFix":    "{{ trans('backpack::crud.infoPostFix') }}",
                "thousands":      "{{ trans('backpack::crud.thousands') }}",
                "lengthMenu":     "{{ trans('backpack::crud.lengthMenu') }}",
                "loadingRecords": "{{ trans('backpack::crud.loadingRecords') }}",
                "processing":     "<img src='/packages/backpack/crud/img/ajax-loader.gif' alt='loading' >Procesando...",
                "search": "_INPUT_",
                "searchPlaceholder": "{{ trans('backpack::crud.search') }}...",
                "zeroRecords":    "{{ trans('backpack::crud.zeroRecords') }}",
                "paginate": {
                    "first":      "{{ trans('backpack::crud.paginate.first') }}",
                    "last":       "{{ trans('backpack::crud.paginate.last') }}",
                    "next":       "<i class='la la-arrow-circle-right fs-24'></i>",
                    "previous":   "<i class='la la-arrow-circle-left fs-24'></i>"
                },
                "aria": {
                    "sortAscending":  "{{ trans('backpack::crud.aria.sortAscending') }}",
                    "sortDescending": "{{ trans('backpack::crud.aria.sortDescending') }}"
                },
                "buttons": {
                    "copy":   "{{ trans('backpack::crud.export.copy') }}",
                    "excel":  "{{ trans('backpack::crud.export.excel') }}",
                    "csv":    "{{ trans('backpack::crud.export.csv') }}",
                    "pdf":    "{{ trans('backpack::crud.export.pdf') }}",
                    "print":  "{{ trans('backpack::crud.export.print') }}",
                    "colvis": "{{ trans('backpack::crud.export.column_visibility') }}"
                },
            },
            /*
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            // show the content of the first column
                            // as the modal header
                            // var data = row.data();
                            // return data[0];
                            return '';
                        }
                    } ),
                    renderer: function ( api, rowIdx, columns ) {

                    var data = $.map( columns, function ( col, i ) {
                        var columnHeading = crud.table.columns().header()[col.columnIndex];

                        // hide columns that have VisibleInModal false
                        if ($(columnHeading).attr('data-visible-in-modal') == 'false') {
                            return '';
                        }

                        return '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                    '<td style="vertical-align:top; border:none;"><strong>'+col.title.trim()+':'+'<strong></td> '+
                                    '<td style="padding-left:10px;padding-bottom:10px; border:none;">'+col.data+'</td>'+
                                '</tr>';
                    } ).join('');

                    return data ?
                        $('<table class="table table-striped mb-0">').append( '<tbody>' + data + '</tbody>' ) :
                        false;
                    },
                }
            },
            fixedHeader: true,
            */
            responsive: false,
            scrollX: true,
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function (index) {
                        let column = this;
                        const skip = column.footer().getAttribute('data-skip');

                        if(skip === 'on' || skip === 'true'){
                            return;
                        }

                        // get title
                        let title = column.footer().textContent;

                        // Create input element
                        let input = document.createElement('input');
                        input.style.width = '100%';
                        input.placeholder = title;
                        input.classList.add('form-control');
                        column.footer().replaceChildren(input);

                        // Event listener for user input
                        input.addEventListener('keyup', () => {
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            }
                        });
                    });
            },
        },
        configCellEdit: {
            inputCss: 'form-control',
            placeholder: 'Ingrese datos..',
            onUpdate: null,
            allowNulls: {
                columns: [],
                errorClass: 'error'
            },
            columns: [],
            confirmationButton: {
                confirmText: 'Hecho',
                confirmCss: 'btn btn-sm btn-success my-1 mx-0',
                cancelCss: 'btn btn-sm btn-danger my-1 mx-0',
                cancelText: 'Cancelar',
            }
        },
        functionsToRunOnDataTablesDrawEvent: [],
        addFunctionToDataTablesDrawEventQueue: function (functionName) {
            if (this.functionsToRunOnDataTablesDrawEvent.indexOf(functionName) == -1) {
            this.functionsToRunOnDataTablesDrawEvent.push(functionName);
            }
        },
        responsiveToggle: function(dt) {
            $(dt.table().header()).find('th').toggleClass('all');
            dt.responsive.rebuild();
            dt.responsive.recalc();
        },
        executeFunctionByName: function(str, args) {
            var arr = str.split('.');
            var fn = window[ arr[0] ];

            for (var i = 1; i < arr.length; i++)
            { fn = fn[ arr[i] ]; }
            fn.apply(window, args);
        },
        executeCellEditOnUpdate: function(updatedCell, updatedRow, oldValue){
            new Noty({
                type: "success",
                title: "Crud DataTable",
                text: `<strong>Crud DataTable</strong><br>Registro cambiado.`
            }).show();
        }
    };

    jQuery(document).ready(function(){

        /*
        // Generate field filter from footer
        $('input[id^="searchfil"]').on('input', function() {
            var columnaId = $(this).data('index');
            var valorFiltro = $(this).val();
            window.crud.table.search(valorFiltro).draw();

            // Esperar al evento 'draw.dt' y filtrar por columna
            $('#' + audfk.crud.configDataTable.id).one('draw.dt', function() {
                $('#' + audfk.crud.configDataTable.id + ' tbody tr ').each(function() {
                    var valorColumna = $(this).find('td:eq(' + columnaId + ')').text().toLowerCase();
                    if (valorColumna.includes(valorFiltro.toLowerCase())) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
        */

        // enable tooltip Boostrap
        $('[data-toggle="tooltip"]').tooltip();

        // override ajax error message
        $.fn.dataTable.ext.errMode = 'none';
        $('#' + audfk.crud.configDataTable.id).on('error.dt', function(e, settings, techNote, message) {
            new Noty({
                type: "error",
                text: "<strong>{{ trans('backpack::crud.ajax_error_title') }}</strong><br>{{ trans('backpack::crud.ajax_error_text') }}"
            }).show();
        });

        // on DataTable draw event run all functions in the queue
        // (eg. delete and details_row buttons add functions to this queue)
        $('#' + audfk.crud.configDataTable.id).on( 'draw.dt',   function () {
            audfk.crud.functionsToRunOnDataTablesDrawEvent.forEach(function(functionName) {
                audfk.crud.executeFunctionByName(functionName);
            });
        } ).dataTable();

        // when datatables-colvis (column visibility) is toggled
        // rebuild the datatable using the datatable-responsive plugin
        $('#' + audfk.crud.configDataTable.id).on( 'column-visibility.dt',   function (event) {
            audfk.crud.table.responsive.rebuild();
        } ).dataTable();

        // when columns are hidden by reponsive plugin,
        // the table should have the has-hidden-columns class
        audfk.crud.table.on( 'responsive-resize', function ( e, datatable, columns ) {
            if (audfk.crud.table.responsive.hasHidden()) {
              $('#' + audfk.crud.configDataTable.id).removeClass('has-hidden-columns').addClass('has-hidden-columns');
             } else {
              $('#' + audfk.crud.configDataTable.id).removeClass('has-hidden-columns');
             }
        } );

        // make sure the column headings have the same width as the actual columns
        // after the user manually resizes the window
        var resizeTimer;
        function resizeCrudTableColumnWidths() {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(function() {
            // Run code here, resizing has "stopped"
            audfk.crud.table.columns.adjust();
          }, 250);
        }
        $(window).on('resize', function(e) {
          resizeCrudTableColumnWidths();
        });
        $('.sidebar-toggler').click(function() {
          resizeCrudTableColumnWidths();
        });

    });
</script>
