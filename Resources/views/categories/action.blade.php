<div class="btn-group btn-group-sm">
    @can('categories-update')
        <a href="{{ route('admin.categories.edit', $id) }}" class="btn btn-success">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
    @can('categories-delete')
            <a href="{{ route('admin.categories.destroy', $id) }}" class="btn btn-danger confirm-delete">
                <i class="fas fa-trash"></i>
            </a>
    @endcan
</div>
