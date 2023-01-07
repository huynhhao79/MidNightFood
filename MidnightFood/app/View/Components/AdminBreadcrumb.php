<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminBreadcrumb extends Component
{
    public $page;
    public $path;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page, $path)
    {
        $this->page=$page;
        $this->path=explode("/", $path);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.admin-breadcrumb');
    }
}
