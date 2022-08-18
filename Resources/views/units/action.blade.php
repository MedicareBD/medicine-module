<div class="btn-group btn-group-sm">
    @can('units-update')
        <a href="{{ route('admin.units.edit', $id) }}" class="btn btn-success">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('units-delete')
            <a href="{{ route('admin.units.destroy', $id) }}" class="btn btn-danger confirm-delete">
                <i class="fas fa-trash"></i>
            </a>
    @endcan
</div>
