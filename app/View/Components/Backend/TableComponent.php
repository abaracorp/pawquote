<?php

namespace App\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    public $headers;
    public $rows;
    public $pagination;

    public function __construct($headers = [], $rows = [], $pagination = null)
    {
        $this->headers = $headers;
        $this->rows = $rows;
        $this->pagination = $pagination;
    }

    public function render()
    {
        return view('components.backend.table-component');
    }
}


