@if ($crud->hasAccess('view_form-generatepdf'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/generatepdf') }}" class="btn btn-sm btn-link">
        <i class="la la-magic"></i> Generar PDF
    </a>
@endif
