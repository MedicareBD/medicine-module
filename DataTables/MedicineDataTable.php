<?php

namespace Modules\Medicine\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Medicine\Entities\Medicine;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MedicineDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('image', fn ($model) => '<img src="'.asset($model->image).'" height="30">')
            ->editColumn('category_id', fn ($model) => $model->category->name ?? null)
            ->editColumn('manufacturer_id', fn ($model) => $model->manufacturer->name ?? null)
            ->editColumn('created_at', fn ($model) => format_date($model->created_at))
            ->addColumn('action', fn ($model) => view('medicine::medicines.action', compact('model')))
            ->setRowId('id')
            ->rawColumns(['image', 'action']);
    }

    public function query(Medicine $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-datatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom(config('custom.table.dom'))
            ->orderBy(1)
            ->stateSave()
            ->autoWidth()
            ->responsive()
            ->addTableClass(config('custom.table.class'))
            ->parameters([
                'scrollY' => true,
            ]);
    }

    protected function getColumns(): array
    {
        return [
            Column::make('id')
                ->data('DT_RowIndex')
                ->printable(false)
                ->exportable(false)
                ->orderable(false)
                ->title('#'),
            Column::make('image')->title(__('Image')),
            Column::make('name')->title(__('Medicine Name')),
            Column::make('generic_name')->title(__('Generic Name')),
            Column::make('category_id')->title(__('Category')),
            Column::make('manufacturer_id')->title(__('Manufacturer')),
            Column::make('shelf')->title(__('Shelf')),
            Column::make('price')->title(__('Price')),
            Column::make('manufacturer_price')->title(__('Manufacturer Price')),
            Column::make('strength')->title(__('Strength')),
            Column::make('created_at')->title(__('Created At')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Action'),
        ];
    }

    protected function filename(): string
    {
        return 'Medicines_'.date('YmdHis');
    }
}
