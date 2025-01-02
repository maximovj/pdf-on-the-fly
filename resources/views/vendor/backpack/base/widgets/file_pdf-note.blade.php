@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start')
    <div class="alert alert-warning fs-14" role="alert">
        <h4 class="alert-heading font-weight-bold">NOTA</h4>
        <p>
            Todos los elementos son archivos PDF en forma de formulario con campos ya definidos.
        </p>
        <hr>
        <p class="mb-0">
            Puede generar un archivo PDF y/o crear un borrador con campos <a href="{{ route('view-form.index') }}" >aquí</a>
        </p>
  </div>
@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end')
