@if ($crud->hasAccess('generate_pdf-downloadpdf'))
    @if ($entry->generated === 1)
        <a href="javascript:void(0)" onclick="downloadPdfEntry(this)"
            data-entry_path="{{ asset('storage/' . $entry->path) }}"
            data-entry_download="{{ $entry->download }}"
            data-button-type="generate_pdf-downloadpdf"
            class="btn btn-sm btn-link">
            <i class="la la-download"></i> Descargar
        </a>
    @endif
@endif

{{-- Button Javascript --}}
{{-- - used right away in AJAX operations (ex: List) --}}
{{-- - pushed to the end of the page, after jQuery is loaded, for non-AJAX operations (ex: Show) --}}
@push('after_scripts') @if (request()->ajax())
@endpush
@endif
    <script src="{{ asset('js/custom/downloadPdfEntry.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
@if (!request()->ajax())
@endpush
@endif
