@php
    //dd(session('edit_mode_fields', []));
@endphp

<table class="bg-white table table-striped table-hover table-responsive-css rounded shadow-xs wrap border-xs my-4" cellspacing="0">
    <thead class="thead-dark">
        <tr class="text-center align-middle text-uppercase">
            <th>Actividades</th>
            <th>SI</th>
            <th>NO</th>
            <th>N/A</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Lorem ipsum dolor sit. <br>
                ¿Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores voluptatem non earum?
            </td>
            <td class="text-center align-middle"><input name="si0" type="checkbox" class="form-check-input-css" {{ editmode_e('si0') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="no0" type="checkbox" class="form-check-input-css" {{ editmode_e('no0') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="na0" type="checkbox" class="form-check-input-css" {{ editmode_e('na0') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><textarea name="txta0" class="form-control">{{ editmode_e('txta0') }}</textarea></td>
        </tr>
        <tr>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, sunt!?
            </td>
            <td class="text-center align-middle"><input name="si1" type="checkbox" class="form-check-input-css" {{ editmode_e('si1') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="no1" type="checkbox" class="form-check-input-css" {{ editmode_e('no1') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="na1" type="checkbox" class="form-check-input-css" {{ editmode_e('na1') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><textarea name="txta1" class="form-control">{{ editmode_e('txta1') }}</textarea></td>
        </tr>
        <tr>
            <td>
                ¿Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, voluptatum.?
            </td>
            <td class="text-center align-middle"><input name="si2" type="checkbox" class="form-check-input-css" {{ editmode_e('si2') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="no2" type="checkbox" class="form-check-input-css" {{ editmode_e('no2') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="na2" type="checkbox" class="form-check-input-css" {{ editmode_e('na2') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><textarea name="txta2" class="form-control">{{ editmode_e('txta2') }}</textarea></td>
        </tr>
        <tr>
            <td>
                ¿Lorem, ipsum dolor sit amet consectetur adipisicing.?
            </td>
            <td class="text-center align-middle"><input name="si3" type="checkbox" class="form-check-input-css" {{ editmode_e('si3') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="no3" type="checkbox" class="form-check-input-css" {{ editmode_e('no3') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><input name="na3" type="checkbox" class="form-check-input-css" {{ editmode_e('na3') ? 'checked' : '' }}></td>
            <td class="text-center align-middle"><textarea name="txta3" class="form-control">{{ editmode_e('txta3') }}</textarea></td>
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
                    <input type="date" name="date0" class="form-control" value="{{ editmode_e('date0', '2024-12-12') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing.</label>
                    <input type="number" name="num0" class="form-control" value="{{ editmode_e('num0', 0) }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing..</label>
                    <select name="slt0" class="form-control" value="{{ editmode_e('slt0', '0') }}">
                        <option value="0" {{ editmode_e('slt0') === '0' ? 'selected' : '' }} >Lorem ipsum dolor sit amet.</option>
                        <option value="1" {{ editmode_e('slt0') === '1' ? 'selected' : '' }} >Lorem, ipsum dolor.</option>
                        <option value="2" {{ editmode_e('slt0') === '2' ? 'selected' : '' }} >Lorem ipsum dolor sit.</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mb-2">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing..</label>
                    <fieldset class="form-group">
                        <div class="row">
                            {{-- <legend class="col-form-label col-sm-2 pt-0">Lorem ipsum dolor sit amet.</legend> --}}

                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad0" id="rad01" value="option1" {{ editmode_e('rad0') === 'option1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rad01">
                                        First radio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rad0" id="rad02" value="option2" {{ editmode_e('rad0') === 'option2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rad02">
                                        Second radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="rad0" id="rad03" value="option3" {{ editmode_e('rad0') === 'option3' ? 'checked' : '' }} disabled>
                                    <label class="form-check-label" for="rad03">
                                        Third disabled radio
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
