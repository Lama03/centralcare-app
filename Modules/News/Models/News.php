<?php

namespace Modules\News\Models;


use App\Constants\Statuses;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;
use Modules\News\Models\NewsCategory;

class News extends Eloquent  implements TranslatableContract
{

    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'image', 'status'
    ];

    public $translatedAttributes = ['name', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url', 'slug'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    protected $appends = [
        'statusLabel'
    ];

    public function getStatusLabelAttribute()
    {
        return Statuses::getLabel($this->status);
    }


}
