
/*****************************************************
 * Victor J.
 * Este función sirve para ejecutar lógica de la operación de `DownloadPDFOperation`
 *
 * @created 31/12/2024
 * @created 31/12/2024
 * @usado resources\views\vendor\backpack\crud\buttons\generate_pdf\downloadpdf.blade.php
 *****************************************************/

if (typeof downloadPdfEntry != 'function') {
    $("[data-button-type=delete]").unbind('click');

    function downloadPdfEntry(button) {

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
            title: "Petición",
            text: `${"Enviando petición, por favor, espere...."}`,
            icon: "success",
            allowOutsideClick: false,
            showConfirmButton: false,
            showCancelButton: false,
            showCloseButton: false,
            didOpen: async () => {
                /* Code here */
                Swal.showLoading();
                await fetch(entry_path)
                    .then(response => response.blob())
                    .then(blob => {
                        Swal.close();
                        // Crear una URL para el Blob
                        const url = URL.createObjectURL(blob);

                        // Descargar el archivo
                        fnDownloadFile(url, entry_download);

                        // Liberar memoria de la URL temporal
                        URL.revokeObjectURL(url);

                        // Mostrar mensaje exitosa
                        new Noty({
                            type: "success",
                            title: "Descargar PDF",
                            text: `<strong>Archivo descargado exitosamente</strong><br>`
                        }).show();

                    })
                    .catch(error => {
                        Swal.close();
                        console.error('downloadPdfEntry::error', ' | ', error);

                        // Mostrar mensaje de error
                        new Noty({
                            type: "error",
                            title: "Descargar PDF",
                            text: `<strong>Lo siento hubo un error al descargar el archivo</strong><br>${error}`
                        }).show();
                    });
            },
            willClose: () => {
                Swal.close();
            }
        });

    }
}

// make it so that the function above is run after each DataTable draw event
// crud.addFunctionToDataTablesDrawEventQueue('downloadPdfEntry');
