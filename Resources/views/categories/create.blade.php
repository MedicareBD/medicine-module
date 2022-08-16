@extends('core::layouts.admin.app')

@section('title', __('Create category'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>@lang('Add Category')</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.manufacturer.index') }}" class="btn btn-primary">
                            <i class="fas fa-align-justify"></i> @lang('Category List')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="post" class="instant_reload_form">
                        @csrf
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">@lang('Category Name') <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input name="category_name" class="form-control" type="text" placeholder="@lang('Category Name')" id="category_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">@lang('Status') <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="1" checked="checked" id="status">
                                    @lang('Active')
                                </label>
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="0" id="status">
                                    @lang('Inactive')
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    @lang('Save')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
