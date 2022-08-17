@extends('core::layouts.admin.app')

@section('title', __('Edit category'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Edit Unit') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                            <i class="fas fa-align-justify"></i> {{ __('Unit List') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="post" class="instant_reload_form">
                        @csrf
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">{{ __('Category Name') }} <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input name="category_name" class="form-control" type="text" placeholder="{{ __('Category Name') }}" id="category_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }} <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="1" checked="checked" id="status">
                                    {{ __('Active') }}
                                </label>
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="0" id="status">
                                    {{ __('Inactive') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
