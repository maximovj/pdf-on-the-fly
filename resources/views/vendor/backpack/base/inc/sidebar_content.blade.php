<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>

{{-- BackPack Crud Controller | FilePDFCrudController --}}
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('file-pdf') }}'>
        <i class='nav-icon la la-file-pdf'></i> Archivos PDF
    </a>
</li>

{{-- BackPack Crud Controller | ViewFormCrudController --}}
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('view-form') }}'>
        <i class='nav-icon la la-th-list'></i> Formularios
    </a>
</li>

{{-- BackPack Crud Controller | GeneratePDFCrudController --}}
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('generate-pdf') }}'>
        <i class='nav-icon la la-file-text-o'></i> Generados PDF
    </a>
</li>
