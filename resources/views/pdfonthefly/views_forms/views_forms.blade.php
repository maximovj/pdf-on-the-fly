{{-- @see https://backpackforlaravel.com/docs/4.1/base-about#add-a-custom-page-to-your-admin-panel-dynamic-page --}}
{{-- @see https://backpackforlaravel.com/docs/4.1/base-how-to#use-the-html-css-for-the-front-end-backstrap-for-front-facing-we --}}
@extends(backpack_view('blank'))

@section('after_styles')

@push('after_styles')

@section('content')
    <h1>Documento:  {{ $entry->id }}</h1>
@stop

@section('after_scripts')

@push('after_scripts')

