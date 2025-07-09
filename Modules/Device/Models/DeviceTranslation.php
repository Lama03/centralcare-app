<?php

namespace Modules\Device\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceTranslation extends Model
{
    protected $table = 'devices_translations';

    protected $fillable = ['name', 'description', 'features'];
}
