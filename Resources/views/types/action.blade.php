<div class="btn-group btn-group-sm">
    @can('types-update')
        <a href="{{ route('admin.types.edit', $id) }}" class="btn btn-success">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('types-delete')
            <a href="{{ route('admin.types.destroy', $id) }}" class="btn btn-danger confirm-delete">
                <i class="fas fa-trash"></i>
            </a>
    @endcan
</div>
