<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view): void
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}