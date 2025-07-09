<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategoryTranslation extends Model
{
    protected $table = 'news_categories_translations';

    protected $fillable = ['name', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url','slug'];
}
