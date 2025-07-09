<?php

namespace Modules\Slider\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $fillable = ['first_title', 'second_title', 'description'];
}
