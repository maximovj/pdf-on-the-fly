@if ($crud->hasAccess('generate_pdf-pdfonthefly'))
    @if ($entry->generated === 1)
        <a href="javascript:void(0)" onclick="pdfOnTheFlyEntry(this)"
            data-route="{{ route('api.v1.view-form.save_pdf', ['id' => $entry->file_pdf_id]) }}"
            data-entry="{{ $entry }}"
            data-entry_file_storage="{{ asset('storage/' . $entry->file_pdf->file_storage) }}"
            data-button-type="generate_pdf-pdfonthefly"
            class="btn btn-sm btn-link">
            <i class="la la-magic"></i> PDFOnTheFly
        </a>
    @endif
@endif

{{-- Button Javascript --}}
{{-- - used right away in AJAX operations (ex: List) --}}
{{-- - pushed to the end of the page, after jQuery is loaded, for non-AJAX operations (ex: Show) --}}
@push('after_scripts') @if (request()->ajax())
@endpush
@endif
    <script src="{{ asset('js/custom/pdfOnTheFlyEntry.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
@if (!request()->ajax())
@endpush
@endif
