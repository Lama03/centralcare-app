<?php

namespace Modules\Device\Models;

use App\Constants\Statuses;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Eloquent;
use Modules\Page\Models\Page;

class Device extends Eloquent implements TranslatableContract
{
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'status'
    ];

    protected $appends =[
        'statusLabel'
    ];

    public $translatedAttributes = ['name', 'description', 'features'];

    public function getStatusLabelAttribute()
    {
        return Statuses::getLabel($this->status);
    }
}
