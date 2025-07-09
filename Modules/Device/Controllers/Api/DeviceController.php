<?php

namespace Modules\Device\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Device\Models\Device;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
            $device = Device::query()
                ->select('devices.*')
                ->orderBy(request()->get('sort', 'devices.created_at'), request()->get('direction', 'DESC'))
                ->orderBy('devices.id', request()->get('direction', 'DESC'))
                ->paginate(10);

        return response()->json($device);
    }
}
