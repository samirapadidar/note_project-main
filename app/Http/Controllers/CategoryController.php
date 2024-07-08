<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\EditCategory;

class CategoryController extends Controller
{
    /**
     * Property Note
     * @var CategoryServiceInterface
     */
    private CategoryServiceInterface $category_service;

    /**
     * injecting dependencies
     * @param CategoryServiceInterface $category_service
     */
    public function __construct(CategoryServiceInterface $category_service)
    {
        $this->category_service = $category_service;
    }

    /**
     * Get And Return a Category
     * Route: Web/categories/update/{id}
     * Method:get
     * @param int $id
     * @return View
     */
    public function getCategory(int $id): View
    {
        return $this->category_service->getCategory(id: $id);
    }

    /**
     * Show All Categories
     * Method:get
     * Return Get All Categories
     * @return View
     */
    public function getAllCategories(): View
    {
        return $this->category_service->getAllCategories();
    }

    /**
     * Show All Categories Tree Form
     * Method:get
     * Return Get All Categories
     * @return View
     */
    public function getTreeCategories(): View
    {
        return $this->category_service->getTreeCategories();
    }

    /**
     * Create New Category
     * Route: Web/categories/create
     * Method:post
     * Return  RedirectResponse
     * @param CreateCategory $request
     * @return RedirectResponse
     */
    public function createCategory(CreateCategory $request): RedirectResponse
    {
        $data = $request->getData();
        return $this->category_service->createCategory(data: $data);
    }

    /**
     * Update Single Category
     * Method:put
     * Return RedirectResponse
     * @param EditCategory $request
     * @return RedirectResponse
     */
    public function updateCategory(EditCategory $request): RedirectResponse
    {
        $data = $request->getData();
        $category_id = $request->getCategoryId();
        return $this->category_service->updateCategory(id: $category_id, data: $data);
    }
}