<?php

namespace Modules\Offer\Models;

use Illuminate\Database\Eloquent\Model;

class OfferBrancheTranslation extends Model
{
    protected $fillable = ['name','slug','desc_offer','currency'];
}