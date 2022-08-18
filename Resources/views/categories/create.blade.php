@extends('core::layouts.admin.app')

@section('title', __('Create Category'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Add Category') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                            <i class="fas fa-align-justify"></i> {{ __('Category List') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="post" class="instant_reload_form">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="required">{{ __('Category Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Enter category name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status" class="required">{{ __('Status') }}</label>
                            <select name="status" id="status" data-control="select2" required>
                                <option value="1">{{ __("Active") }}</option>
                                <option value="0">{{ __("Inactive") }}</option>
                            </select>
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
