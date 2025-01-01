@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start')
    <div class="alert alert-primary" role="alert">
        <hr>
        <p class="mb-0">
            Todos los elementos son archivos PDF en forma de formulario con campos ya definidos. <br/>
            Puede generar un archivo PDF y/o crear un borrador con campos <a href="{{ route('view-form.index') }}" class="text-dark">aquí</a>
        </p>
  </div>
@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end')
