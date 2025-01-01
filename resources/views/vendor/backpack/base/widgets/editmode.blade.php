@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start')
    <div class="alert alert-warning fs-14" role="alert">
        <h4 class="alert-heading font-weight-bold">NOTA</h4>
        <p>
            Al producir un cambio en el formulario, automaticamene el sistema creará un borrador con todas las respuetas.<br/>
            Al presionar el boton de <span class="badge badge-success"><i class="la la-check-circle"></i> Generar PDF</span>,  automaticamene el sistema registrará el arhivo generado con el estado de <span class="badge badge-success">generado</span>.<br/>
        </p>
        <hr>
        <p class="mb-0">
            Los borradores y los archivos PDF generados, estan listados <a href="{{ route('generate-pdf.index') }}" >aquí</a>
        </p>
  </div>
@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end')
