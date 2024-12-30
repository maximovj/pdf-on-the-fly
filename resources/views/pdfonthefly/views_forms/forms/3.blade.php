@php
    //dd(session('edit_mode_fields', []));
@endphp

<table class="bg-white table table-striped table-hover table-responsive-css rounded shadow-xs wrap border-xs my-4" cellspacing="0">
    <thead class="thead-dark">
        <tr class="text-center align-middle text-uppercase">
            <th>LOREM 1</th>
            <th>LOREM 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Lorem ipsum dolor sit. <br>
            </td>
            <td class="text-center align-middle"><textarea name="fd0" class="form-control">{{ editmode_e('fd0') }}</textarea></td>
        </tr>
        <tr>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, sunt!?
            </td>
            <td class="text-center align-middle"><textarea name="fd1" class="form-control">{{ editmode_e('fd1') }}</textarea></td>
        </tr>
        <tr>
            <td>
                ¿Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, voluptatum.?
            </td>
            <td class="text-center align-middle"><textarea name="fd2" class="form-control">{{ editmode_e('fd2') }}</textarea></td>
        </tr>
        <tr>
            <td>
                ¿Lorem, ipsum dolor sit amet consectetur adipisicing.?
            </td>
            <td class="text-center align-middle"><textarea name="fd3" class="form-control">{{ editmode_e('fd3') }}</textarea></td>
        </tr>
    </tbody>
</table>

<div class="card">
    <div class="card-header card-header-css">
        <h1 class="txt-h1-css">Lorem ipsum dolor sit amet consectetur.</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                    <textarea name="fd4" class="form-control">{{ editmode_e('fd4') }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                    <textarea name="fd5" class="form-control">{{ editmode_e('fd5') }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                    <textarea name="fd6" class="form-control">{{ editmode_e('fd6') }}</textarea>
                </div>
            </div>
        </div>
        <span class="fs-14 font-weight-bold">Lorem ipsum dolor sit amet consectetur adipisicing..</span>
        <div class="row">
            <div class="col-1 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <input name="fd7" type="checkbox" class="form-check-input-css" {{ editmode_e('fd7') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-10 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <input name="fd8" type="checkbox" class="form-check-input-css" {{ editmode_e('fd8') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-10 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <input name="fd9" type="checkbox" class="form-check-input-css" {{ editmode_e('fd9') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-10 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                    <textarea name="fd10" class="form-control">{{ editmode_e('fd10') }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                    <textarea name="fd11" class="form-control">{{ editmode_e('fd11') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="bg-white table table-striped table-hover table-responsive-css rounded shadow-xs wrap border-xs my-4" cellspacing="0">
    <thead class="thead-dark">
        <tr class="text-center align-middle text-uppercase">
            <th>#</th>
            <th>LOREM 1</th>
            <th>SI</th>
            <th>NO</th>
            <th>NA</th>
            <th>LOREM 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                # 1
            </td>
            <td>
                Lorem ipsum dolor sit, amet consectetur adipisicing. <br>
                ¿Lorem ipsum dolor sit.?
                <input type="text" name="txt0" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt0') }}" />
            </td>
            <td class="text-center align-middle"><input name="si0" type="checkbox" class="form-check-input-css" {{ editmode_e('si0') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="no0" type="checkbox" class="form-check-input-css" {{ editmode_e('no0') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="na0" type="checkbox" class="form-check-input-css" {{ editmode_e('na0') ? 'checked' : '' }}></td>
            <td class="text-center align-middle">
                <input type="text" name="txt1" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt1') }}" />
            </td>
        </tr>
        <tr>
            <td>
                # 2
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet.? <br>
                <input type="text" name="txt2" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt2') }}" />
            </td>
            <td class="text-center align-middle"><input name="si1" type="checkbox" class="form-check-input-css" {{ editmode_e('si1') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="no1" type="checkbox" class="form-check-input-css" {{ editmode_e('no1') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="na1" type="checkbox" class="form-check-input-css" {{ editmode_e('na1') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle">
                <input type="text" name="txt3" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt3') }}" />
            </td>
        </tr>
        <tr>
            <td>
                # 3
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur adipisicing.? <br>
                <input type="text" name="txt4" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt4') }}" />
            </td>
            <td class="text-center align-middle"><input name="si2" type="checkbox" class="form-check-input-css" {{ editmode_e('si2') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="no2" type="checkbox" class="form-check-input-css" {{ editmode_e('no2') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="na2" type="checkbox" class="form-check-input-css" {{ editmode_e('na2') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle">
                <input type="text" name="txt5" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt5') }}" />
            </td>
        </tr>
        <tr>
            <td>
                # 4
            </td>
            <td>
                ¿Lorem, ipsum dolor sit amet consectetur adipisicing.? <br>
                <input type="text" name="txt6" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt6') }}" />
            </td>
            <td class="text-center align-middle"><input name="si3" type="checkbox" class="form-check-input-css" {{ editmode_e('si3') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="no3" type="checkbox" class="form-check-input-css" {{ editmode_e('no3') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="na3" type="checkbox" class="form-check-input-css" {{ editmode_e('na3') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle">
                <input type="text" name="txt7" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt7') }}" />
            </td>
        </tr>
        <tr>
            <td>
                # 5
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet.? <br>
                <input type="text" name="txt8" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt8') }}" />
            </td>
            <td class="text-center align-middle"><input name="si4" type="checkbox" class="form-check-input-css" {{ editmode_e('si4') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="no4" type="checkbox" class="form-check-input-css" {{ editmode_e('no4') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="na4" type="checkbox" class="form-check-input-css" {{ editmode_e('na4') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle">
                <input type="text" name="txt9" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt9') }}" />
            </td>
        </tr>
        <tr>
            <td>
                # 6
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur.? <br>
                <input type="text" name="txt10" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt10') }}" />
            </td>
            <td class="text-center align-middle"><input name="si5" type="checkbox" class="form-check-input-css" {{ editmode_e('si5') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="no5" type="checkbox" class="form-check-input-css" {{ editmode_e('no5') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle"><input name="na5" type="checkbox" class="form-check-input-css" {{ editmode_e('na5') ? 'checked' : '' }} /></td>
            <td class="text-center align-middle">
                <input type="text" name="txt11" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('txt11') }}" />
            </td>
        </tr>
    </tbody>
</table>
