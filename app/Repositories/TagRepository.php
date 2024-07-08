<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Models\Tag;
use App\Models\CategoryTag;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

class TagRepository implements TagRepositoryInterface
{
    /**
     * Get And Return Tag
     * @param int $id
     * @return Tag
     */
    public function getTag(int $id): Tag
    {
        return Tag::findOrFail($id);
    }

     /**
     * Get And Return Tag By Name
     * @param int $id
     * @return Tag
     */
    public function getTagByName(string $name): Tag
    {
        return Tag::where('name', $name)->first();
    }

    /**
     * Get And Return All Tag
     * @param int $count
     * @return Collection
     */
    public function getAllTags(): Collection
    {
        return Tag::all();
    }

    /**
     * Create New Tag
     * @param array $data
     * @return Tag|false
     */
    public function createTag(array $data): Tag|false
    {
        $tag = new Tag();
        $tag->name = $data['name'];
        try {
            $tag->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.tag.create_error') . $e->getMessage());
            return false;
        }
        return $tag;
    }

    /**
     * attach Tag To Category for create between relationship
     * @param Category $category
     * @param Tag $tag
     * @return CategoryTag|false
     */
    public function attachTagToCategory(Category $category, Tag $tag): CategoryTag|false
    {
        $category_tag = new CategoryTag();
        $category_tag->category_id = $category->id;
        $category_tag->tag_id = $tag->id;
        try {
            $category_tag->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.tag.create_error') . $e->getMessage());
            return false;
        }
        return $category_tag;
    }

    /**
     * Update Single Tag
     * @param Tag $tag
     * @param array $data
     * @return Tag|false
     */
    public function updateTag(Tag $tag, array $data): Tag|false
    {
        if (isset($data['name'])) {
            $tag->name = $data['name'];
        }
        try {
            $tag->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.tag.create_error') . $e->getMessage());
            return false;
        }
        return $tag;
    }
}
