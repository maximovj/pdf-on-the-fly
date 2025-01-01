
/*****************************************************
 * Victor J.
 * Este función sirve para ejecutar lógica de la operación de `PdfOnTheFlyOperation`
 *
 * @created 31/12/2024
 * @created 31/12/2024
 * @usado resources\views\vendor\backpack\crud\buttons\generate_pdf\pdfonthefly.blade.php
 *****************************************************/

if (typeof pdfOnTheFlyEntry != 'function') {
    $("[data-button-type=generate_pdf-pdfonthefly]").unbind('click');

    function pdfOnTheFlyEntry(button) {

        // ask for confirmation before deleting an item
        // e.preventDefault();
        var entry_path = $(button).attr('data-entry_path');
        //console.log('entry_path', '=>', entry_path);
        var entry_download = $(button).attr('data-entry_download');
        //console.log('entry_download', '=>', entry_download);

        if (!entry_path || !entry_download) {
            // Show a success notification bubble
            new Noty({
                type: "error",
                title: "Petición",
                text: `<strong>Este elemento no está generado</strong><br>`
            }).show();
            return;
        }

        Swal.fire({
            title: "Petición",
            text: `Enviando petición, por favor, espere....`,
            icon: "success",
            allowOutsideClick: false,
            showConfirmButton: false,
            showCancelButton: false,
            showCloseButton: false,
            didOpen: async () => {
                /* Code here */
                Swal.showLoading();
                setTimeout(() => { Swal.close(); }, 2000);
            },
            willClose: () => {
                Swal.close();
            }
        });

    }
}

// make it so that the function above is run after each DataTable draw event
// crud.addFunctionToDataTablesDrawEventQueue('pdfOnTheFlyEntry');
