<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategorylObserver
{


    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        if (!is_null($category->getOriginal('image'))) {
            Storage::disk('public')->delete($category->getOriginal('image'));
        }
    }

    public function saved(Category $category){

        if ($category->isDirty('image') && !is_null($category->getOriginal('image'))) {
            Storage::disk('public')->delete($category->getOriginal('image'));
        }
    }
}
