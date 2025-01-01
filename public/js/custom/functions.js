/*
 * Victor J.
 * date 28/12/2024
 * update 28/12/2024
 * desc Aquí están las funciones de globales de JavaScript
 */


/*****************************************************
 * Victor J.
 * Este función sirve para descargar un archivo
 *
 * @created 31/12/2024
 * @created 31/12/2024
 * @usado resources\views\vendor\backpack\crud\buttons\generate_pdf\downloadpdf.blade.php
 *****************************************************/

function fnDownloadFile(fileUrl, fileName) {
    //const fileUrl = 'https://example.com/file.pdf'; // URL del archivo
    //const fileName = 'archivo-descargado.pdf'; // Nombre deseado para el archivo

    // Crear un elemento <a>
    const a = document.createElement('a');
    a.href = fileUrl; // URL del archivo
    a.download = fileName; // Nombre del archivo para la descarga
    document.body.appendChild(a);
    a.click(); // Simular clic para iniciar la descarga
    document.body.removeChild(a); // Eliminar el elemento después
}

/*****************************************************
 * Victor J.
 * Este función sirve mostrar un archivo PDF dentro de un modal de SweetAlert2
 *
 * @created 31/12/2024
 * @created 31/12/2024
 * @usado public\js\custom\pdfOnTheFlyEntry.js
 * @usado public\js\custom\previewPdfEntry.js
 *****************************************************/
function fnIframeFilePDFPreview(fileUrl) {
    Swal.fire({
        html: `
        <object
            data= "${fileUrl}"
            type= "application/pdf"
            width= "100%"
            height= "400px"
            title= "Visor de PDF integrado"
        >
            <iframe
                src= "${fileUrl}"
                width= "100%"
                height= "100%"
                style= "border: none"
                title= "Visor de PDF integrado, respaldo de iframe"
            >
                <p>
                    Su navegador no admite archivos PDF. <a href= "${fileUrl}" >
                    Descargar el PDF</a>
                </p>
            </iframe>
        </object>
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
