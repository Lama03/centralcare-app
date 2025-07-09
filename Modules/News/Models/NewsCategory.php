<?php

namespace Modules\News\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;

class NewsCategory extends Eloquent  implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'slug', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url'];

}
