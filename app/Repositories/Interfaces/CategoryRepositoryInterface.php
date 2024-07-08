<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    /**
     * Get And Return Single Category
     * @param int $id
     * @return Category
     */
    public function getCategory(int $id): Category;

    /**
     * Get And Return All Categories
     * @param int $count
     * @return Collection
     */
    public function getAllCategories(bool $with_tree = false): Collection;

    /**
     * Create New Category
     * @param array $data
     * @return Category|false
     */
    public function createCategory(array $data): Category|false;

    /**
     * Update Single Category
     * @param Category $category
     * @param array $data
     * @return Category|false
     */
    public function updateCategory(Category $category, array $data): Category|false;
}
