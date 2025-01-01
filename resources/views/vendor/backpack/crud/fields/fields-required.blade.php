<!-- html5 color input -->
@include('crud::fields.inc.wrapper_start')
    <div class="alert {{ $field['alert_type'] ?? 'alert alert-primary' }}" style="font-size: 14px;" role="alert">
        <span style="color: white;">Los campos con (<span class="field-req-css"></span> ) son obligatorios.</span>
    </div>
@include('crud::fields.inc.wrapper_end')

