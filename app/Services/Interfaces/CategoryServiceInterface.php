<?php

namespace App\Services\Interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface CategoryServiceInterface
{
    /**
     * Get Category
     * @param int $id
     * @return View
     */
    public function getCategory(int $id): View;

    /**
     * Get All Categories
     * @return View
     */
    public function getAllCategories(): View;

    /**
     * Get Tree Category
     * @return View
     */
    public function getTreeCategories(): View;

    /**
     * create New Category
     * @param array $data
     * @return RedirectResponse
     */
    public function createCategory(array $data): RedirectResponse;

    /**
     * Update Exist Category
     * @param int $id
     * @param array $data
     * @return RedirectResponse
     */
    public function updateCategory(int $id, array $data): RedirectResponse;
}