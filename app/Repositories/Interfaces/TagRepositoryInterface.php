<?php

namespace App\Repositories\Interfaces;

use App\Models\Tag;
use App\Models\Category;
use App\Models\CategoryTag;
use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryInterface
{
    /**
     * Get And Return Single Tag
     * @param int $id
     * @return Tag
     */
    public function getTag(int $id): Tag;

    /**
     * Get And Return Tag By Name
     * @param int $id
     * @return Tag
     */
    public function getTagByName(string $name): Tag;

    /**
     * Get And Return All Tags
     * @param int $count
     * @return Collection
     */
    public function getAllTags(): Collection;

    /**
     * Create New Tag
     * @param array $data
     * @return Tag|false
     */
    public function createTag(array $data): Tag|false;

    /**
     * attach Tag To Category for create between relationship
     * @param Category $category
     * @param Tag $tag
     * @return CategoryTag|false
     */
    public function attachTagToCategory(Category $category, Tag $tag): CategoryTag|false;

    /**
     * Update Single Tag
     * @param Tag $tag
     * @param array $data
     * @return Tag|false
     */
    public function updateTag(Tag $tag, array $data): Tag|false;
}
