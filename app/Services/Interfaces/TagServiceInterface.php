<?php

namespace App\Services\Interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface TagServiceInterface
{
    /**
     * Get Tag
     * @param int $id
     * @return mixed
     */
    public function getTag(int $id): View;

    /**
     * Get All Tag
     * @return mixed
     */
    public function getAllTags(): View;

    /**
     * create New Tag
     * @param array $data
     * @return RedirectResponse
     */
    public function createTag(array $data): RedirectResponse;

    /**
     * Update Exist Tag
     * @param int $id
     * @param array $data
     * @return JsonResponse
     */
    public function updateTag(int $id, array $data): RedirectResponse;
}
