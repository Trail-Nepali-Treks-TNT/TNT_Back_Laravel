<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Repositories\ServiceRegionRepository;
use App\Repositories\ServiceTypeRepository;
use Illuminate\Http\Request;

class ServiceRegionController extends Controller
{
    protected $serviceTypeRepository;
    protected $serviceRegionRepository;
    protected $mediaRepository;

    public function __construct(ServiceTypeRepository $serviceTypeRepository, ServiceRegionRepository $serviceRegionRepository, MediaRepository $mediaRepository)
    {
        $this->serviceTypeRepository = $serviceTypeRepository;
        $this->serviceRegionRepository = $serviceRegionRepository;
        $this->mediaRepository = $mediaRepository;
    }

    public function index()
    {
        $serviceRegions = $this->serviceRegionRepository->paginate(10);
        return view('ServiceRegion.index', compact('serviceRegions'));
    }

    public function create()
    {
        $serviceTypes = $this->serviceTypeRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        return view('ServiceRegion.create', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        // Validate regular fields, file inputs, and the service type selection.
        $data = $request->validate([
            'name'            => 'required|string',
            'description'     => 'required|string',
            'reason'          => 'required|string',
            'service_type_id' => 'required|exists:service_types,id',
            'banner_file'     => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'dashboard_file'  => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $entity = [
            'name' => $data['name'],
            'description' => $data['description'],
            'reason' => $data['reason'],
            'service_type_id' => $data['service_type_id'],
        ];
        $response = $this->serviceRegionRepository->create($entity)->toArray();
        $service_region_id = $response['id'];

        $response['banner_file_detail_id'] = $this->mediaRepository->storeSingle($data['banner_file'], 'ServiceRegion/{$service_region_id}');
        $response['dahboard_file_detail_id'] = $this->mediaRepository->storeSingle($data['dashboard_file'], 'ServiceRegion/{$service_region_id}');

        $this->serviceRegionRepository->update($service_region_id, $response);

        return redirect()->route('ServiceRegion.index')->with('success', 'Service Region created successfully.');
    }
    public function edit($id)
    {
        $serviceRegion = $this->serviceRegionRepository->findOrFail($id);
        $serviceTypes = $this->serviceTypeRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        return view('ServiceRegion.edit', compact('serviceRegion','serviceTypes'));
    }

    public function delete($id)
    {
        $this->serviceRegionRepository->delete($id);
        return redirect()->route('ServiceRegion.index')->with('success', 'Service Region deleted successfully.');
    }
}
