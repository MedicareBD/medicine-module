<div class="btn-group btn-group-sm">
    @can('leafs-update')
        <a href="{{ route('admin.leafs.edit', $id) }}" class="btn btn-success">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('leafs-delete')
            <a href="{{ route('admin.leafs.destroy', $id) }}" class="btn btn-danger confirm-delete">
                <i class="fas fa-trash"></i>
            </a>
    @endcan
</div>
