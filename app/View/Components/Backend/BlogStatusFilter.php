<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class BlogStatusFilter extends Component
{
    public $count;

    public function __construct($count)
    {
        $this->count = $count;
    }

    public function render()
    {
        return view('components.backend.blog-status-filter');
    }
}

