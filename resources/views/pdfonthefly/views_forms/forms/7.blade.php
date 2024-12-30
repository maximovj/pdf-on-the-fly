@php
    //dd(session('edit_mode_fields', []));
@endphp

<table class="bg-white table table-striped table-hover table-responsive-css rounded shadow-xs wrap border-xs my-4" cellspacing="0">
    <thead class="thead-dark">
        <tr class="text-center align-middle text-uppercase">
            <th>#</th>
            <th>LOREM 1</th>
            <th>LOREM 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">
                # 1
            </td>
            <td>
                Lorem ipsum dolor sit, amet consectetur adipisicing. <br>
                ¿Lorem ipsum dolor sit.?
            </td>
            <td class="align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit...</label>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input-css" type="radio" name="fd0" id="fd01" value="option1" {{ editmode_e('fd0') === 'option1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd01">
                                        &nbsp;First radio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input-css" type="radio" name="fd0" id="fd02" value="option2" {{ editmode_e('fd0') === 'option2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd02">
                                        &nbsp;Second radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input-css" type="radio" name="fd0" id="fd03" value="option3" {{ editmode_e('fd0') === 'option3' ? 'checked' : '' }} disabled>
                                    <label class="form-check-label" for="fd03">
                                        &nbsp;Third disabled radio
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 2
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur...</label>
                    <select name="fd1" class="form-control" value="{{ editmode_e('fd1', '0') }}">
                        <option value="0" {{ editmode_e('fd1') === '0' ? 'selected' : '' }} >Lorem ipsum dolor sit amet consectetur.</option>
                        <option value="1" {{ editmode_e('fd1') === '1' ? 'selected' : '' }} >Lorem, ipsum dolor.</option>
                        <option value="2" {{ editmode_e('fd1') === '2' ? 'selected' : '' }} >Lorem ipsum, dolor sit amet consectetur adipisicing.</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 3
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur adipisicing.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit...</label>
                    <input type="date" name="fd2" class="form-control" value="{{ editmode_e('fd2', '2024-12-12') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 4
            </td>
            <td>
                ¿Lorem ipsum dolor sit.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet...</label>
                    <input type="number" name="fd3" class="form-control" value="{{ editmode_e('fd3', 0) }}" />
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 5
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem, ipsum dolor...</label>
                    <input type="number" name="fd4" class="form-control" value="{{ editmode_e('fd4', 0) }}" />
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 6
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet...</label>
                    <select name="fd5" class="form-control" value="{{ editmode_e('fd5', '0') }}">
                        <option value="0" {{ editmode_e('fd5') === '0' ? 'selected' : '' }} >Lorem ipsum dolor sit amet consectetur.</option>
                        <option value="1" {{ editmode_e('fd5') === '1' ? 'selected' : '' }} >Lorem ipsum dolor sit amet, consectetur adipisicing.</option>
                        <option value="2" {{ editmode_e('fd5') === '2' ? 'selected' : '' }} >Lorem ipsum dolor sit.</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 7
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur adipisicing.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur...</label>
                    <select name="fd6" class="form-control" value="{{ editmode_e('fd6', '0') }}">
                        <option value="0" {{ editmode_e('fd6') === '0' ? 'selected' : '' }} >Lorem ipsum dolor sit amet.</option>
                        <option value="1" {{ editmode_e('fd6') === '1' ? 'selected' : '' }} >Lorem, ipsum dolor.</option>
                        <option value="2" {{ editmode_e('fd6') === '2' ? 'selected' : '' }} >Lorem ipsum dolor sit.</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 8
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit...</label>
                    <input type="text" name="fd7" class="form-control" placeholder="Lorem ..." value="{{ editmode_e('fd7') }}" />
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 9
            </td>
            <td>
                ¿Lorem ipsum dolor sit.?
            </td>
            <td class="text-center align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet...</label>
                    <textarea name="fd8" class="form-control" placeholder="Lorem ...">{{ editmode_e('fd8') }}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 10
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet.?
            </td>
            <td class="align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem, ipsum dolor...</label>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input-css" type="radio" name="fd9" id="fd91" value="option1" {{ editmode_e('fd9') === 'option1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd91">
                                        &nbsp;First radio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input-css" type="radio" name="fd9" id="fd92" value="option2" {{ editmode_e('fd9') === 'option2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd92">
                                        &nbsp;Second radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input-css" type="radio" name="fd9" id="fd93" value="option3" {{ editmode_e('fd9') === 'option3' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd93">
                                        &nbsp;Third radio
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 11
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur.?
            </td>
            <td class="align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit...</label>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input-css" type="radio" name="fd10" id="fd101" value="option1" {{ editmode_e('fd10') === 'option1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd101">
                                        &nbsp;First radio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input-css" type="radio" name="fd10" id="fd102" value="option2" {{ editmode_e('fd10') === 'option2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd102">
                                        &nbsp;Second radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input-css" type="radio" name="fd10" id="fd103" value="option3" {{ editmode_e('fd10') === 'option3' ? 'checked' : '' }} >
                                    <label class="form-check-label" for="fd103">
                                        &nbsp;Third radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input-css" type="radio" name="fd10" id="fd104" value="option4" {{ editmode_e('fd10') === 'option3' ? 'checked' : '' }} >
                                    <label class="form-check-label" for="fd103">
                                        &nbsp;Fourd radio
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                # 12
            </td>
            <td>
                ¿Lorem ipsum dolor sit amet consectetur adipisicing.?
            </td>
            <td class="align-middle">
                <div data-mdb-input-init class="form-outline">
                    <label class="form-label txt-label-css">Lorem ipsum dolor sit amet consectetur adipisicing..</label>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input-css" type="checkbox" name="fd11" id="fd11" {{ editmode_e('fd11') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fd11">
                                       &nbsp;First checkbox
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </td>
        </tr>
    </tbody>
</table>


