@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start')
    <div class="{{ $widget['class'] ?? 'alert alert-primary' }}" role="alert">

        <!-- Mostrar botón para cerrar al alerta -->
        @if (isset($widget['close_button']) && $widget['close_button'])
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        @endif

        <!-- Mostrar la cabecera del alerta -->
        @if (isset($widget['header']))
        <h4 class="alert-heading font-weight-bold">{!! $widget['header'] !!}</h4>
        @endif

        <!-- Mostrar el cuerpo del alerta -->
        @if (isset($widget['body']))
        <p>
            {!! $widget['body'] !!}
        </p>
        @endif

        <!-- Mostrar el pie del alerta -->
        @if (isset($widget['footer']))
        <hr>
        <p class="mb-0">
            {!! $widget['footer'] !!}
        </p>
        @endif
  </div>
@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end')
