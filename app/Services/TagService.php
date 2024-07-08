<?php

namespace App\Services;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Interfaces\TagServiceInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagService implements TagServiceInterface
{
    /**
     * Inject Tag Repository
     * @var TagRepositoryInterface
     */
    private TagRepositoryInterface $tag_repository;

    /**
     * Dependency Injection  By Service Container
     * @param TagMediaRepositoryInterface $tag_repository
     */
    public function __construct(TagRepositoryInterface $tag_repository)
    {
        $this->tag_repository = $tag_repository;
    }

    /**
     * Get Tag
     * @param int $id
     * @return JsonResponse
     */
    public function getTag(int $id): View
    {
        $tag = $this->tag_repository->getTag(id: $id);
        return view('tags.edit', ['tag' => $tag]);
    }

    /**
     * Get All Tag
     * @return View
     */
    public function getAllTags(): View
    {
        $tags = $this->tag_repository->getAllTags();
        return view('tags.list', ['tags' => $tags]);
    }

    /**
     * create New Tag
     * @param array $data
     * @return RedirectResponse
     */
    public function createTag(array $data): RedirectResponse
    {
        $result = $this->tag_repository->createTag(data: $data);
        if (!$result) {
            Log::error(trans('response.tag.create_error'));
            return redirect('tags')->with('error', 'Tag failed to create!');
        }
        return redirect('tags')->with('successfully', 'Tag created successfully');
    }

    /**
     * Update Exist Tag
     * @param int $id
     * @param array $data
     * @return RedirectResponse
     */
    public function updateTag(int $id, array $data): RedirectResponse
    {
        $tag = $this->tag_repository->getTag(id: $id);
        $result = $this->tag_repository->updateTag(tag: $tag, data: $data);
        if (!$result) {
            Log::error(trans('response.tag.update_error'));
            return redirect('tags')->with('error', 'Tag failed to update!');
        }
        return redirect('tags')->with('successfully', 'Tag updated successfully');
    }
}