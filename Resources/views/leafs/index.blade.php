@extends('core::layouts.admin.app')

@section('title', __('Manage Leaf'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('Leaf List') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.leafs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('Add Leaf') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pageScripts')
     {{ $dataTable->scripts() }}
@endpush
