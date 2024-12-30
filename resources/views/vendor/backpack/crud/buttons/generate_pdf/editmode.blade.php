@if ($crud->hasAccess('generate_pdf-editmode'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/editmode') }}" class="btn btn-sm btn-link">
        <i class="la la-magic"></i> Modo Edición
    </a>
@endif
