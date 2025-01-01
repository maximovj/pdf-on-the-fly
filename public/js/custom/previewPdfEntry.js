
/*****************************************************
 * Victor J.
 * Este función sirve para ejecutar lógica de la operación de `DownloadPDFOperation`
 *
 * @created 31/12/2024
 * @created 31/12/2024
 * @usado resources\views\vendor\backpack\crud\buttons\generate_pdf\previewpdf.blade.php
 *****************************************************/

if (typeof previewPdfEntry != 'function') {
    $("[data-button-type=delete]").unbind('click');

    function previewPdfEntry(button) {

        // ask for confirmation before deleting an item
        // e.preventDefault();
        var entry_path = $(button).attr('data-entry_path');
        //console.log('entry_path','=>',entry_path);
        var entry_download = $(button).attr('data-entry_download');
        //console.log('entry_download','=>',entry_download);

        if (!entry_path || !entry_download) {
            // Show a success notification bubble
            new Noty({
                type: "error",
                title: "Petición",
                text: `<strong>Este elemeno no está generado</strong><br>`
            }).show();
            return;
        }

        Swal.fire({
            html: `
                <iframe src="${entry_path}"
                        width="100%"
                        height="460px"
                        style="border: none;"></iframe>
            `,
            width: '800px',
            allowOutsideClick: false,
            showConfirmButton: false,
            showCancelButton: false,
            showCloseButton: true,
            customClass: {
                popup: 'swal-wide'
            }
        });

    }
}

// make it so that the function above is run after each DataTable draw event
// crud.addFunctionToDataTablesDrawEventQueue('previewPdfEntry');
