<?php

namespace App\Listeners;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Events\CategoryCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CategoryCreatedListener
{
    /**
     * Property Tag
     * @var TagRepositoryInterface
     */
    private TagRepositoryInterface $tag_repository;

    /**
     * Create the event listener.
     * @param TagRepositoryInterface $tag_repository
     */
    public function __construct(TagRepositoryInterface $tag_repository)
    {
        $this->tag_repository = $tag_repository;
    }

    /**
     * Handle the event.
     */
    public function handle(CategoryCreated $event): void
    {
        foreach($event->data['tags'] as $tag){
            $tag = $this->tag_repository->getTagByName($tag);
            if(!$tag){
                $tag = $this->tag_repository->createTag($tag);
            }
            $this->attachTagToCategory($event->category, $tag);
        }
    }




    public function attachTagToCategory($category, $tag)
    {
        $this->tag_repository->attachTagToCategory($category, $tag);
    }
}
