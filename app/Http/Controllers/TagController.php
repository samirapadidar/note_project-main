<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Interfaces\TagServiceInterface;
use App\Http\Requests\CreateTag;
use App\Http\Requests\EditTag;

class TagController extends Controller
{
    /**
     * Property Tag
     * @var TagServiceInterface
     */
    private TagServiceInterface $tag_service;

    /**
     * injecting dependencies
     * @param TagServiceInterface $tag_service
     */
    public function __construct(TagServiceInterface $tag_service)
    {
        $this->tag_service = $tag_service;
    }

    /**
     * Get And Return a Tag
     * Route: Web/tags/update/{id}
     * Method:get
     * @param int $id
     * @return View
     */
    public function getTag(int $id): View
    {
        return $this->tag_service->getTag(id: $id);
    }

    /**
     * Show All tags
     * Method:get
     * Return Get All Tags
     * @return View
     */
    public function getAllTags(): View
    {
        return $this->tag_service->getAllTags();
    }

    /**
     * Create New Tag
     * Route: Web/tags/create
     * Method:post
     * Return  RedirectResponse
     * @param CreateTag $request
     * @return RedirectResponse
     */
    public function createTag(CreateTag $request): RedirectResponse
    {
        $data = $request->getData();
        return $this->tag_service->createTag(data: $data);
    }

    /**
     * Update Single Tag
     * Method:put
     * Return RedirectResponse
     * @param EditTag $request
     * @return RedirectResponse
     */
    public function updateTag(EditTag $request): RedirectResponse
    {
        $data = $request->getData();
        $tag_id = $request->getTagId();
        return $this->tag_service->updateTag(id: $tag_id, data: $data);
    }
}
