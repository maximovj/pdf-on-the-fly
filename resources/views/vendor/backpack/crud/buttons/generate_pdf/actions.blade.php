<div class="btn-group" style="display: inline-block;">
    <button class="btn btn-sm btn-link" type="button" data-toggle="dropdown" aria-expanded="false">
        <span><i class="la la-plus-circle"></i> Acciones</span>
    </button>
    <div class="dropdown-menu z-index-500">
        @if ($entry->generated === 1)
            <a href="javascript:void(0)" onclick="pdfOnTheFlyEntry(this)"
                data-route="{{ route('api.v1.view-form.save_pdf', ['id' => $entry->file_pdf_id]) }}"
                data-entry="{{ $entry }}"
                data-entry_file_storage="{{ asset('storage/' . $entry->file_pdf->file_storage) }}"
                data-button-type="generate_pdf-pdfonthefly"
                class="dropdown-item pointer">
                <i class="la la-magic"></i> PDFOnTheFly
            </a>
            <a href="javascript:void(0)" onclick="previewPdfEntry(this)"
                data-entry_path="{{ asset('storage/' . $entry->path) }}"
                data-entry_download="{{ $entry->download }}"
                data-button-type="generate_pdf-previewpdf"
                class="dropdown-item pointer">
                <i class="la la-eye"></i> Ver PDF
            </a>
            <a href="javascript:void(0)" onclick="downloadPdfEntry(this)"
                data-entry_path="{{ asset('storage/' . $entry->path) }}"
                data-entry_download="{{ $entry->download }}"
                data-button-type="generate_pdf-downloadpdf"
                class="dropdown-item pointer">
                <i class="la la-download"></i> Descargar
            </a>
        @endif
        <a href="{{ url($crud->route.'/'.$entry->getKey().'/editmode') }}" class="dropdown-item pointer">
            <i class="la la-magic"></i> Modo edición
        </a>
        <a href="{{ url($crud->route.'/'.$entry->getKey().'/show') }}" class="dropdown-item pointer">
            <i class="la la-eye"></i> Vista previa
        </a>
        <a href="javascript:void(0)" onclick="deleteEntry(this)"
            data-route="{{ url($crud->route.'/'.$entry->getKey()) }}"
            class="dropdown-item pointer">
            <i class="la la-trash"></i> Eliminar
        </a>
    </div>
</div>

{{-- Button Javascript --}}
{{-- - used right away in AJAX operations (ex: List) --}}
{{-- - pushed to the end of the page, after jQuery is loaded, for non-AJAX operations (ex: Show) --}}
@push('after_scripts') @if (request()->ajax())
@endpush
@endif
    <script src="{{ asset('js/custom/pdfOnTheFlyEntry.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('js/custom/previewPdfEntry.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('js/custom/downloadPdfEntry.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('js/custom/deleteEntry.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
@if (!request()->ajax())
@endpush
@endif
