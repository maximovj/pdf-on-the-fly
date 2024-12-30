{{--
@author Victor J.
@desc This is a template for BackPack include styles and scripts for content form
@created 28/12/2024
@updated 28/12/2024
--}}

@extends(backpack_view('blank'))

{{--
The `@section("before_styles")` directive is used in Blade templating in Laravel to define a section
of content that will be included in the layout before the styles are loaded
--}}
@section("before_styles")
    @stack("audfk_before_styles")
@endsection

{{--
The `@section("after_styles")` directive in this PHP Blade template is used to define a section of
content that will be included in the layout after the styles are loaded.
--}}
@section("after_styles")
<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/custom.css').'?v='.config('backpack.base.cachebusting_string') }}">
<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css').'?v='.config('backpack.base.cachebusting_string') }}">
<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/form.css').'?v='.config('backpack.base.cachebusting_string') }}">

<!-- CRUD FORM CONTENT - crud_fields_styles stack -->
<!-- include select2 css-->
<link href="{{ asset('packages/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('packages/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

{{-- Temporary fix on 4.1 --}}
<style>
    .form-group.required label:not(:empty):not(.form-check-label)::after {
        content: '';
    }

    .form-group.required>label:not(:empty):not(.form-check-label)::after {
        content: ' *';
        color: #ff0000;
    }
</style>

    @stack("audfk_after_styles")
@endsection

{{--
The `@section("before_scripts")` directive in this PHP Blade template is used to define a section of
content that will be included in the layout before the scripts are loaded. Inside this section,
there is a call to `@stack("audfk_before_scripts")`, which is used to push content onto a stack
named "audfk_before_scripts".
--}}
@section("before_scripts")
    @stack("audfk_before_scripts")
@endsection

{{--
The `@section("after_scripts")` directive in this PHP Blade template is used to define a section of
content that will be included in the layout after the scripts are loaded.
--}}
@section("after_scripts")
<script src="{{ asset('packages/backpack/crud/js/custom.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
<script src="{{ asset('packages/backpack/crud/js/crud.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
<script src="{{ asset('packages/backpack/crud/js/form.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>

<!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
<!-- include select2 js-->
<script src="{{ asset('packages/select2/dist/js/select2.full.min.js') }}"></script>
<script>
function bpFieldInitSelect2FromArrayElement(element) {
    if (!element.hasClass("select2-hidden-accessible"))
    {
        let $isFieldInline = element.data('field-is-inline');

        element.select2({
            theme: "bootstrap",
            dropdownParent: $isFieldInline ? $('#inline-create-dialog .modal-content') : document.body
            }).on('select2:unselect', function(e) {
                if ($(this).attr('multiple') && $(this).val().length == 0) {
                    $(this).val(null).trigger('change');
                }
            });
        }
    }
</script>

<script>
function initializeFieldsWithJavascript(container) {
    var selector;
    if (container instanceof jQuery) {
        selector = container;
    } else {
        selector = $(container);
    }
    selector.find("[data-init-function]").not("[data-initialized=true]").each(function() {
        var element = $(this);
        var functionName = element.data('init-function');
        if (typeof window[functionName] === "function") {
            window[functionName](element);
            // mark the element as initialized, so that its function is never called again
            element.attr('data-initialized', 'true');
        }
    });
}

jQuery('document').ready(function($) {

// trigger the javascript for all fields that have their js defined in a separate method
initializeFieldsWithJavascript('form');


// Save button has multiple actions: save and exit, save and edit, save and new
var saveActions = $('#saveActions'),
    crudForm = saveActions.parents('form'),
    saveActionField = $('[name="save_action"]');

saveActions.on('click', '.dropdown-menu a', function() {
    var saveAction = $(this).data('value');
    saveActionField.val(saveAction);
    crudForm.submit();
});

// Ctrl+S and Cmd+S trigger Save button click
$(document).keydown(function(e) {
    if ((e.which == '115' || e.which == '83') && (e.ctrlKey || e.metaKey)) {
        e.preventDefault();
        $("button[type=submit]").trigger('click');
        return false;
    }
    return true;
});

// prevent duplicate entries on double-clicking the submit form
crudForm.submit(function(event) {
    $("button[type=submit]").prop('disabled', true);
});

// Place the focus on the first element in the form
@if($crud->getAutoFocusOnFirstField())


var focusField = $('form').find('input, textarea, select').not('[type="hidden"]').eq(0),

fieldOffset = focusField.offset().top,
scrollTolerance = $(window).height() / 2;

focusField.trigger('focus');

if (fieldOffset > scrollTolerance) {
    $('html, body').animate({
        scrollTop: (fieldOffset - 30)
    });
}
@endif

// Add inline errors to the DOM
@if($crud->inlineErrorsEnabled() && $errors->any())

window.errors = {
    !!json_encode($errors->messages()) !!
};
// console.error(window.errors);

$.each(errors, function(property, messages) {

var normalizedProperty = property.split('.').map(function(item, index) {
    return index === 0 ? item : '[' + item + ']';
}).join('');

var field = $('[name="' + normalizedProperty + '[]"]').length ?
    $('[name="' + normalizedProperty + '[]"]') :
    $('[name="' + normalizedProperty + '"]'),
    container = field.parents('.form-group');

container.addClass('text-danger');
container.children('input, textarea, select').addClass('is-invalid');

$.each(messages, function(key, msg) {
    // highlight the input that errored
    var row = $('<div class="invalid-feedback d-block">' + msg + '</div>');
    row.appendTo(container);

    // highlight its parent tab
    @if($crud->tabsEnabled())
    var tab_id = $(container).closest('[role="tabpanel"]').attr('id');
        ("#form_tabs [aria-controls=" + tab_id + "]").addClass('text-danger');
     @endif
    });
});

@endif

$("a[data-toggle='tab']").click(function() {
    currentTabName = $(this).attr('tab_name');
    $("input[name='current_tab']").val(currentTabName);
});

if (window.location.hash) {
    $("input[name='current_tab']").val(window.location.hash.substr(1));
}

});
</script>

    @stack("audfk_after_scripts")
@endsection
