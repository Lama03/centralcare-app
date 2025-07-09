<?php

namespace Modules\Offer\Models;


use App\Constants\Statuses;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;
use Modules\Service\Models\Service;
use Modules\Offer\Models\OfferBranche;

class Offer extends Eloquent  implements TranslatableContract
{

    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'discount',
        'price_after_discount',
        'image',
        'service_id',
        'slider_image'
    ];

    public $translatedAttributes = [
        'name',
    ];

    /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the post that owns the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branche()
    {
        return $this->belongsTo(OfferBranche::class);
    }

    protected $appends =[
        'statusLabel'
    ];

    public function getStatusLabelAttribute()
    {
        return Statuses::getLabel($this->status);
    }
}
