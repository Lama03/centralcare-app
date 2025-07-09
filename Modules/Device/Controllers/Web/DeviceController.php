<?php

namespace Modules\Device\Controllers\Web;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Modules\Blog\Models\Blog;
use Modules\Device\Models\Device;
use Modules\Service\Models\ServiceTranslation;

class DeviceController extends Controller
{
    private $viewsPath = 'Device.Resources.views.';

    public function index()
    {
        $devices = Device::with('translations')->where('status', Statuses::ACTIVE)->paginate(6);

        $articles = Blog::query()->with('translations')->where('status', Statuses::ACTIVE)->orderBy('id','desc')->inRandomOrder()->limit(9)->get();

        return view($this->viewsPath . 'web.index', compact('devices', 'articles'));
    }
}
