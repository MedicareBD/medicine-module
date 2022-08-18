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
                                    <label for="qr_or_bar_code">{{ __("Bar Code/QR Code") }}</label>
                                    <input type="text" name="qr_or_bar_code" id="qr_or_bar_code" class="form-control" placeholder="{{ __("Enter qr/bar code") }}">
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
                                    <label for="price">{{ __("Price") }}</label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="{{ __("Enter medicine price") }}">
                                </div>
                            </div>
                            <div class="col-md-6"></div>
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
