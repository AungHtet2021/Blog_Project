<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use PhpParser\Node\Expr\Cast;

class categoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd(request('category'));
        return view('components.category-dropdown',[
            'categories'=>Category::all(),
            'currentCategory'=>Category::firstWhere('slug',request('category'))
        ]);
    }
}
