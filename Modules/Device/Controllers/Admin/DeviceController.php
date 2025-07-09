<?php

namespace Modules\Device\Controllers\Admin;

use App\Constants\Statuses;
use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use Modules\Page\Models\Page;
use Modules\Device\Models\Device;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;
use Modules\Device\Http\Requests\DeviceStoreRequest;
use Modules\Device\Http\Requests\DeviceUpdateRequest;

class DeviceController extends Controller
{
    /**
     * @var UploaderService
     */
    private $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    private $viewsPath = 'Device.Resources.views.';

    public function index()
    {

        return view($this->viewsPath.'index');
    }

    public function create()
    {
        return view($this->viewsPath.'create');
    }

    public function store(DeviceStoreRequest $request) {

        $device = new Device();
        $device->fill($request->all());

        if ($request->hasFile('image') ) {
            $device->image = $this->uploaderService->upload($request->file("image"), "devices");
        }

        $device->save();

        return redirect()->route('admin.devices.index')->with(['success' => 'Updated Successfully']);
    }

    public function edit(Device $device)
    {
        return view($this->viewsPath.'edit', compact('device'));
    }

    public function update(Device $device, DeviceUpdateRequest $request)
    {
        $device->fill($request->request->all());

        if ($request->hasFile('image') ) {
            $device->image = $this->uploaderService->upload($request->file("image"), "devices");
        }

        $device->save();

        return redirect()->route('admin.devices.index')->with(['success' => 'Updated Successfully']);
    }

    public function enable(Device $device, Request $request) {
        $device->status = Statuses::ACTIVE;
        $device->save();

        return redirect()->route('admin.devices.index')->with(['success' => 'Updated Successfully']);
    }

    public function disable(Device $device, Request $request) {
        $device->status = Statuses::DISABLED;
        $device->save();

        return redirect()->route('admin.devices.index')->with(['success' => 'Updated Successfully']);
    }
}

