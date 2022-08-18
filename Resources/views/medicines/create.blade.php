@extends('core::layouts.admin.app')

@section('title', __('Create Medicine'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Add Medicine') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.medicines.index') }}" class="btn btn-primary">
                            <i class="fas fa-align-justify"></i> {{ __('Medicine List') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.medicines.store') }}" method="post" class="instant_reload_form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bar_code">{{ __("Bar Code/QR Code") }}</label>
                                    <input type="text" name="bar_code" id="bar_code" class="form-control" placeholder="{{ __("Enter qr/bar code") }}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="required">{{ __("Medicine Name") }}</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ __("Enter medicine name") }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="generic_name">{{ __("Generic Name") }}</label>
                                    <input type="text" name="generic_name" id="generic_name" class="form-control" placeholder="{{ __("Enter medicine generic name") }}">
                                </div>
                                <div class="form-group">
                                    <label for="strength">{{ __("Strength") }}</label>
                                    <input type="text" name="strength" id="strength" class="form-control" placeholder="{{ __("Enter medicine strength") }}">
                                </div>
                                <div class="form-group">
                                    <label for="details">{{ __("Details") }}</label>
                                    <input type="text" name="details" id="details" class="form-control" placeholder="{{ __("Enter medicine details") }}">
                                </div>
                                <div class="form-group">
                                    <label for="unit" class="required">{{ __("Unit") }}</label>
                                    <select name="unit" id="unit" data-control="select2" data-placeholder="{{ __("Select Unit") }}" required>
                                        <option></option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="required">{{ __("Price") }}</label>
                                    <input type="number" step="any" name="price" id="price" class="form-control" placeholder="{{ __("Enter medicine price") }}" required>
                                </div>


                                <div class="form-group">
                                    <label for="manufacturer" class="required">{{ __("Manufacturer") }}</label>
                                    <select name="manufacturer" id="manufacturer" data-placeholder="{{ __('Select Manufacturer') }}" required></select>
                                </div>

                                <div class="form-group">
                                    <label for="manufacturer_price" class="required">{{ __("Manufacturer Price") }}</label>
                                    <input type="number" step="any" name="manufacturer_price" id="manufacturer_price" class="form-control" placeholder="{{ __("Enter medicine manufacturer price") }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shelf">{{ __("Shelf") }}</label>
                                    <input type="text" name="shelf" id="shelf" class="form-control" placeholder="{{ __("Enter medicine shelf") }}">
                                </div>
                                <div class="form-group">
                                    <label for="leaf" class="required">{{ __("Leaf/Box Size") }}</label>
                                    <select name="leaf" id="leaf" data-control="select2" data-placeholder="{{ __("Select Box Size") }}" required>
                                        <option></option>
                                        @foreach($leafs as $leaf)
                                            <option value="{{ $leaf->id }}">{{ $leaf->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="required">{{ __("Category") }}</label>
                                    <select name="category" id="category" data-control="select2" data-placeholder="{{ __("Select Category") }}" required>
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="required">{{ __("Medicine Type") }}</label>
                                    <select name="type" id="type" data-control="select2" data-placeholder="{{ __("Select Type") }}" required>
                                        <option></option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="vat">{{ __("Vat") }}</label>
                                    <input type="number" step="any" name="vat" id="vat" class="form-control" placeholder="{{ __("Enter vat") }}">
                                </div>

                                <div class="form-group">
                                    <label for="igta">{{ __("IGTA") }}</label>
                                    <input type="number" step="any" name="igta" id="igta" class="form-control" placeholder="{{ __("Enter IGTA") }}">
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __("Status") }}</label>
                                    <select name="status" id="status" data-control="select2" data-placeholder="{{ __("Select Status") }}" required>
                                        <option value="1">{{ __("Active") }}</option>
                                        <option value="0">{{ __("Inactive") }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">{{ __("Image") }}</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light float-right submit-button">
                            <i class="fa fa-save"></i>
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pageScripts')
    <script>
        $(document).ready(function () {
            $("#manufacturer").select2({
                ajax: {
                    type: 'post',
                    url: "{{ route('admin.medicines.search-manufacturer') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.data,
                            pagination: {
                                more: (params.page * data.per_page) < data.total
                            }
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2,
                templateResult: formatState,
                templateSelection: formatTemplateSelection
            });


            function formatState (state) {
                if (state.loading) {
                    return state.text;
                }

                return $(
                    '<div class="d-flex align-items-center">'+
                    '<figure class="avatar mr-2 avatar-sm mr-3"><img src="'+state.avatar+'"/></figure>'+
                    '<span> ' + state.text + '</span>'+
                    '</div>'
                    // '<span><img src="'+state.image+'" class="img-flag" /> ' + state.text + '</span>'
                );
            }

            function formatTemplateSelection(state) {
                if (!state.id){
                    return state.text;
                }

                return $(
                    '<div class="d-flex align-items-center">'+
                    '<figure class="avatar mr-2 avatar-sm mr-3"><img src="'+state.avatar+'"/></figure>'+
                    '<span> ' + state.text + '</span>'+
                    '</div>'
                    // '<span><img src="'+state.image+'" class="img-flag" /> ' + state.text + '</span>'
                );
            }
        })
    </script>
@endpush
