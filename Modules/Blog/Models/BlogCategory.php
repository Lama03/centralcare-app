<?php

namespace Modules\Blog\Models;

use App\Constants\Statuses;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;

class BlogCategory extends Eloquent  implements TranslatableContract
{
    use Translatable;
    protected $fillable = ['name', 'status'];

    public $translatedAttributes = ['name','meta_title', 'meta_description', 'meta_keywords', 'canonical_url','slug'];

    protected $appends = ['statusLabel'];

    public function getStatusLabelAttribute()
    {
        return Statuses::getLabel($this->status);
    }
}
