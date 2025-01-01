
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
        var route = $(button).attr('data-route');
        //console.log('route','=>',route);
        var entry = $(button).attr('data-entry');
        //console.log('entry','=>',entry);
        var entry_file_storage = $(button).attr('data-entry_file_storage');
        //console.log('entry_file_storage','=>',entry_file_storage);

        var obj_entry = JSON.parse(entry);
        //console.log('obj_entry','=>',obj_entry);
        var file_pdf_id = obj_entry.file_pdf_id;
        //console.log('file_pdf_id','=>',file_pdf_id);
        var fields = JSON.parse(obj_entry.fields);
        //console.log('fields','=>',fields);

        if (!route || !entry || !entry_file_storage || !obj_entry || !file_pdf_id || !fields) {
            // Show a success notification bubble
            new Noty({
                type: "error",
                title: "Petición",
                text: `<strong>Datos incompletos</strong><br>`
            }).show();
            return;
        }

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
                //setTimeout(()=>{ Swal.close(); }, 2000);

                // Tu código existente para cargar el formulario PDF
                const {
                    PDFDocument,
                    StandardFonts
                } = PDFLib;

                // Get binary PDF
                const formUrl = entry_file_storage.replace(/\//g, "\\");
                const formPdfBytes = await fetch(formUrl).then(res => res.arrayBuffer());

                // Get binary Logo and Emblem image (PNG necesary)

                // Load file .PDF
                const pdfDoc = await PDFDocument.load(formPdfBytes);

                // Get Font Style
                const helvetica = await pdfDoc.embedFont(StandardFonts.Helvetica);
                const fontSize = 9;
                const maxCharacters = 90;

                // Get fill form to file PDF
                const form = pdfDoc.getForm();

                Object.keys(fields).forEach(keys => {
                    try {
                        const input_form_field = form.getTextField(keys);
                        input_form_field.defaultUpdateAppearances(helvetica);
                        input_form_field.setFontSize(fontSize);
                        input_form_field.setText(fields[keys] === true ? '  X' : fields[keys]);
                    } catch (error) { }
                });

                //form.flatten();

                // Serialize the PDFDocument to bytes
                const pdfBytes = await pdfDoc.save();

                // Create a Blob from the PDF bytes
                const pdfBlob = new Blob([pdfBytes], {
                    type: 'application/pdf'
                });

                // Create a FormData object and add the Blob to the form
                const formData = new FormData();
                formData.append('pdfFile', pdfBlob, 'pdf-generated.pdf');
                formData.append('fields', JSON.stringify(fields));

                // Send the POST request to the server
                await fetch(route, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.close();
                            new Noty({
                                type: "success",
                                text: "El elemento se ha generado correctamente."
                            }).show();
                            // Mostrar el archivo PDF
                            fnIframeFilePDFPreview(data.urlFilePath);
                        }
                    })
                    .catch(error => {
                        Swal.close();
                        console.error('Error al guardar el PDF:', error);
                    });
            },
            willClose: () => {
                Swal.close();
            }
        });

    }
}

// make it so that the function above is run after each DataTable draw event
// crud.addFunctionToDataTablesDrawEventQueue('pdfOnTheFlyEntry');
