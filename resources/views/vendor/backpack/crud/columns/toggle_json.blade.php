@php
    $value = is_string($entry->{$column['name']}) ?
        json_decode($entry->{$column['name']}, true) :
        $entry->{$column['name']};

    $column['text'] = json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    $column['escaped'] = $column['escaped'] ?? true;
    $column['prefix'] = $column['prefix'] ?? '';
    $column['suffix'] = $column['suffix'] ?? '';
    $column['wrapper']['element'] = $column['wrapper']['element'] ?? 'pre';
    $column['wrapper']['id'] = $column['wrapper']['id'] ?? $column['name'];
    $column['wrapper']['class'] = $column['wrapper']['class'] ?? 'd-none';

    if(!empty($column['text'])) {
        $column['text'] = $column['prefix'].$column['text'].$column['suffix'];
    }

@endphp

<div class="row flex flex-row justify-content-between mx-1">
    <span id="txt-entry-toggle" class="d-inline  font-weight-bold fs-14">Contenido oculto</span>
    <span></span>
    <button
    type="button"
    class="btn btn-outline-primary btn-sm mx-2"
    onclick="entryToggleEntry(this);"
    data-name="{{ $column['wrapper']['id'] }}"
    data-button-type="entry-toggle"><i id="icon-entry-toggle" class="la la-eye"></i></button>
</div>

@includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')
@if($column['escaped'])
{{ $column['text'] }}
@else
{!! $column['text'] !!}
@endif
@includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')

@push('after_scripts') @if (request()->ajax())
@endpush
@endif
    <script>
        if (typeof downloadPdfEntry != 'function') {
            $("[data-button-type=entry-toggle]").unbind('click');

            function entryToggleEntry(button) {
                var entry_name = $(button).attr('data-name');
                $('#'+entry_name)
                .toggleClass('d-none')
                .toggleClass('d-block');

                $('span#txt-entry-toggle')
                .toggleClass('d-inline')
                .toggleClass('d-none');

                $('i#icon-entry-toggle')
                .toggleClass('la la-eye')
                .toggleClass('la la-eye-slash');
            }

        }
    </script>
@if (!request()->ajax())
@endpush
@endif
