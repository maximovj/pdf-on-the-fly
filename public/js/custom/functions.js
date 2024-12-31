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
