<div class="btn-group btn-group-sm">
    @if($model->bar_code)
        @can('medicines-read')
            <a href="{{ route('admin.medicines.show', $model->id) }}" class="btn btn-primary waves-effect waves-light preview-modal"
               data-title="{{ __("Show Medicine") }}"
               data-size="modal-lg"
            >
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('admin.medicines.show-bar-codes', $model->id) }}" class="btn btn-primary waves-effect waves-light preview-modal"
               data-title="{{ __("Bar Codes") }}"
               data-size="modal-lg"
            >
                <i class="fas fa-bar-chart"></i>
            </a>

            <a href="{{ route('admin.medicines.show-qr-codes', $model->id) }}" class="btn btn-primary waves-effect waves-light preview-modal"
               data-title="{{ __("QR Codes") }}"
               data-size="modal-lg"
            >
                <i class="fas fa-qrcode"></i>
            </a>
        @endcan
    @endif
    @can('medicines-update')
        <a href="{{ route('admin.medicines.edit', $model->id) }}" class="btn btn-success waves-effect waves-light">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('medicines-delete')
            <a href="{{ route('admin.medicines.destroy', $model->id) }}" class="btn btn-danger waves-effect waves-light confirm-delete">
                <i class="fas fa-trash"></i>
            </a>
    @endcan
</div>
