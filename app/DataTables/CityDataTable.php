<?php

namespace App\DataTables;

use App\Models\City;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CityDataTable extends DataTable
{
    /**
     * Custom page to print
     *
     * @var string
     */
    protected $printPreview = 'admin.layouts.datatable.print';

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->escapeColumns([])
            ->addColumn('check', 'admin.cities.datatables.check')
            ->editColumn('name', function ($q) {
                return "<a href='".route('cities.show', $q->id)."'>".$q->getTranslation('name','en')." - ".$q->getTranslation('name','ar')."</a>";
            })
            ->editColumn('country.name', function ($q) {
                return "<a href='".route('countries.show', $q->country_id)."'>".$q->country->getTranslation('name','en')." - ".$q->country->getTranslation('name','ar')."</a>";
            })
            ->editColumn('status', function ($q) {
                if($q->status =='in_active'){
                    return '<span class="badge badge badge-danger">غير فعال</span>';
                }else{
                    return '<span class="badge badge badge-success"> فعال</span>';

                }

            })
            ->rawColumns(['action','status'])
            ->addColumn('actions', 'admin.cities.datatables.actions');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\City $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(City $model)
    {
        return $model->newQuery()->with('country')->select('cities.*');

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
           return $this->builder()
                        ->columns($this->getColumns())
                        ->minifiedAjax()
                        ->parameters([
                            'dom'          => 'Blfrtip',
                            'lengthMenu'   => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                            'buttons' => ['csv', 'excel', 'print', 'reset', 'reload'],
                            'order' => [
                                1, 'asc'
                            ]
                        ]);


    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

          return [
                ['name' => 'check', 'data' => 'check', 'title' => '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" id="check_all"/><span></span></label> ', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
                ['name' => 'id', 'data' => 'id', 'title' => 'الرقم التسلسلى'],
                ['name' => 'name', 'data' => 'name', 'title' => 'الاسم'],
                ['name' => 'country.name', 'data' => 'country.name', 'title' => 'الدولة'],
                ['name' => 'status', 'data' => 'status', 'title' => 'الحالة'],
                ['name' => 'actions', 'data' => 'actions', 'title' => 'التحكم', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
            ];



    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'City_' . date('YmdHis');
    }
}
