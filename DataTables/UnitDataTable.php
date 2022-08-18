<?php

namespace Modules\Medicine\DataTables;

use Modules\Medicine\Entities\Unit;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UnitDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('status', fn($model) => $model->status ? '<span class="badge badge-success"><i class="fas fa-check-circle"></i> '.__("Active").'</span>' : '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> '.__("Inactive").'</span>')
            ->editColumn('created_at', fn($model) => format_date($model->created_at))
            ->addColumn('action', 'medicine::units.action')
            ->setRowId('id')
            ->rawColumns(['action', 'status']);
    }

    public function query(Unit $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('units-datatable-table')
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
            Column::make('name')->title(__("Name")),
            Column::make('status')->title(__("Status"))->addClass('text-center'),
            Column::make('created_at')->title(__("Created At")),
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
        return 'Units_' . date('YmdHis');
    }
}
