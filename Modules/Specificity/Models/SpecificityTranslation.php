<?php

namespace Modules\Specificity\Models;

use Illuminate\Database\Eloquent\Model;

class SpecificityTranslation extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'alt_image','alt_brief_image','brief'];
}
