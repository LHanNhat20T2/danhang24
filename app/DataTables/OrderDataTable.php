<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('user_name', function ($query) {
                return $query->user?->name;
            })
            ->addColumn('total', function ($query) {
                return number_format($query->total, 0, ',', '.') . ' VNĐ';
            })
            ->addColumn('order_status', function ($query) {
                if (strcasecmp($query->order_status, 'Đã duyệt') === 0) {
                    return '<span class="badge badge-success">Đã duyệt</span>';
                } elseif (strcasecmp($query->order_status, 'Chờ duyệt') === 0) {
                    return '<span class="badge badge-warning">Chờ duyệt</span>';
                } else {
                    return '<span class="badge badge-danger">Từ chối</span>';
                }
            })
            ->addColumn('payment_status', function ($query) {
                if (strcasecmp($query->payment_status, 'Đã thanh toán') === 0) {
                    return '<span class="badge badge-success">Đã thanh toán</span>';
                } else {
                    return '<span class="badge badge-warning">Chưa thanh toán</span>';
                }
            })
            ->addColumn('date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('action', function ($query) {
                $view = "<a href='" . route('admin.orders.show', $query->id) . "' class='btn btn-primary'><i class='fas fa-eye'></i></a>";
                $status = "<a href='javascript:;' class='ml-2 btn btn-warning order_status_btn' data-id='" . $query->id . "'><i class='fas fa-truck-loading' data-toggle='modal' data-target='#order_Modal'></i></a>";
                $delete = "<a href='" . route('admin.orders.destroy', $query->id) . "' class='ml-2 btn btn-danger delete-item' id='delete'><i class='fas fa-trash'></i></a>";


                return $view . $status . $delete;
            })
            ->rawColumns(['order_status', 'payment_status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('order-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('invoice_id')->title('Mã đơn'),
            Column::make('user_name')->title('Tên'),
            Column::make('product_qty')->title('Số lượng'),
            Column::make('total')->title('Tổng tiền'),
            Column::make('order_status')->title('Trạng thái đơn'),
            Column::make('payment_status')->title('Trạng thái thanh toán'),
            Column::make('date')->title('Ngày tạo'),
            Column::computed('action')->title('Thao tác')
                ->exportable(false)
                ->printable(false)
                ->width(164)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
