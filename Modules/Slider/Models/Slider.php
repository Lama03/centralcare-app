<?php

namespace Modules\Slider\Models;

use App\Constants\Statuses;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;
use Modules\Page\Models\Page;

class Slider extends Eloquent  implements TranslatableContract
{
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image'];

    protected $appends = ['statusLabel', 'title'];

    public $translatedAttributes = ['first_title', 'second_title', 'description'];

    public function getTitleAttribute()
    {
        return $this->first_title . ' ' . $this->second_title;
    }

    public function getStatusLabelAttribute()
    {
        return Statuses::getLabel($this->status);
    }
}
