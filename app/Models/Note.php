<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = ['title', 'category_id', 'content'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
