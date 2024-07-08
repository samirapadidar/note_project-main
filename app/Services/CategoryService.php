<?php

namespace App\Services;

use App\Events\CategoryCreated;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Tag;

class CategoryService implements CategoryServiceInterface
{
    /**
     * Inject Category Repository
     * @var CategoryRepositoryInterface
     * @var TagRepositoryInterface
     */
    private CategoryRepositoryInterface $category_repository;
    private TagRepositoryInterface $tag_repository;

    /**
     * Dependency Injection  By Service Container
     * @param CategoryRepositoryInterface $category_repository
     * @param TagRepositoryInterface $tag_repository
     */
    public function __construct(CategoryRepositoryInterface $category_repository, TagRepositoryInterface $tag_repository)
    {
        $this->category_repository = $category_repository;
        $this->tag_repository = $tag_repository;
    }

    /**
     * Get Category
     * @param int $id
     * @return View
     */
    public function getCategory(int $id): View
    {
        $category = $this->category_repository->getCategory(id: $id);
        $categories = $this->category_repository->getAllCategories();
        return view('categories.edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Get All Category
     * @return View
     */
    public function getAllCategories(): View
    {
        $categories = $this->category_repository->getAllCategories();
        $tags = $this->tag_repository->getAllTags();
        return view('categories.list', ['categories' => $categories, 'tags' => $tags]);
    }

     /**
     * Get Tree Category
     * @return View
     */
    public function getTreeCategories(): View
    {
        $categories = $this->category_repository->getAllCategories(with_tree: true);
        return view('categories.listtree', ['categories' => $categories]);
    }

    /**
     * Create New Category
     * @param array $data
     * @return RedirectResponse
     */
    public function createCategory(array $data): RedirectResponse
    {
        $category = $this->category_repository->createCategory(data: $data);
        event(new CategoryCreated(category: $category, data: $data));
        if (!$category) {
            Log::error(trans('response.category.create_error'));
            return redirect('categories')->with('error', 'category failed to create!');
        }
        return redirect('categories')->with('successfully', 'category created successfully');
    }

    /**
     * Update Exist Category
     * @param int $id
     * @param array $data
     * @return RedirectResponse
     */
    public function updateCategory(int $id, array $data): RedirectResponse
    {
        $category = $this->category_repository->getCategory(id: $id);
        $result = $this->category_repository->updateCategory(category: $category, data: $data);
        if (!$result) {
            Log::error(trans('response.category.update_error'));
            return redirect('categories')->with('error', 'category failed to update!');
        }
        return redirect('categories')->with('successfully', 'category updated successfully');
    }
}
