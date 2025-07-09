<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    protected $fillable = ['name', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url','slug'];
}
