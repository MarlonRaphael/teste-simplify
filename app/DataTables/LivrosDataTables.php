<?php

namespace App\DataTables;

use App\Models\Livro;
use Yajra\DataTables\Services\DataTable;

class LivrosDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('action', function ($livro) {
                return view('partials.actions')
                    ->with(['item' => $livro]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Livro $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Livro $model)
    {
        return $model->newQuery()
            ->select([
                'id',
                'titulo',
                'autor',
                'editora',
                'idioma',
                'edicao',
                'ano',
                'formato',
                'paginas'
            ]);
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
            ->colReorderRealtime(true)
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'titulo',
            'autor',
            'editora',
            'idioma',
            'edicao',
            'ano',
            'formato',
            'paginas'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LivrosDataTables_' . date('YmdHis');
    }
}
