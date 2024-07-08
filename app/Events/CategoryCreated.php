<?php

namespace App\Events;

use App\Models\Category;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoryCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * Set Category Variable
     *
     * @var Category
     */
    public Category $category;

    /**
     * Variable For passed data
     *
     * @var array
     */

     public array $data;

    /**
     * Create a new event instance.
     */
    public function __construct(Category $category, array $data)
    {
        $this->category = $category;
        $this->data = $data;
    }
}
