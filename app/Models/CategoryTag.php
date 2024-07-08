<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryTag extends Pivot
{
    protected $table = 'category_tag';

    protected $fillable = ['category_id', 'tag_id'];

    public $incrementing = false;

    protected $primaryKey = null;
}
