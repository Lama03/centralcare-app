<?php

namespace Modules\Offer\Models;

use App\Constants\Statuses;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;

class OfferBranche extends Eloquent  implements TranslatableContract
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['image'];

    public $translatedAttributes = ['name','slug','desc_offer','currency'];

    protected $appends =[
        'statusLabel'
    ];

    public function getStatusLabelAttribute()
    {
        return Statuses::getLabel($this->status);
    }

}