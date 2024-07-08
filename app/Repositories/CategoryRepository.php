<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Get And Return Category
     * @param int $id
     * @return Category
     */
    public function getCategory(int $id): Category
    {
        return Category::findOrFail($id);
    }

    /**
     * Get And Return All Category
     * @param bool $count
     * @return Collection
     */
    public function getAllCategories(bool $with_tree = false): Collection
    {
        return Category::query()
            ->when($with_tree, function ($query) {
                $query->whereNull('parent_id')->with('children');
            })->get();
    }

    /**
     * Create New Category
     * @param array $data
     * @return Category|false
     */
    public function createCategory(array $data): Category|false
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->parent_id = $data['category_id'];
        try {
            $category->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.category.create_error') . $e->getMessage());
            return false;
        }
        return $category;
    }

    /**
     * Update Single Category
     * @param category $category
     * @param array $data
     * @return Category|false
     */
    public function updateCategory(Category $category, array $data): Category|false
    {
        if (isset($data['name'])) {
            $category->name = $data['name'];
        }
        if (isset($data['parent_id'])) {
            $category->parent_id = $data['parent_id'];
        }
        try {
            $category->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.category.create_error') . $e->getMessage());
            return false;
        }
        return $category;
    }
}