<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Repositories\ServiceRegionFAQRepository;
use App\Repositories\ServiceRegionRepository;
use App\Repositories\ServiceTypeRepository;
use Illuminate\Http\Request;

class ServiceRegionController extends Controller
{
    protected $serviceTypeRepository;
    protected $serviceRegionRepository;
    protected $mediaRepository;
    protected $serviceRegionFAQRepository;

    public function __construct(
        ServiceTypeRepository $serviceTypeRepository,
        ServiceRegionRepository $serviceRegionRepository,
        MediaRepository $mediaRepository,
        ServiceRegionFAQRepository $serviceRegionFAQRepository
    ) {
        $this->serviceTypeRepository = $serviceTypeRepository;
        $this->serviceRegionRepository = $serviceRegionRepository;
        $this->mediaRepository = $mediaRepository;
        $this->serviceRegionFAQRepository = $serviceRegionFAQRepository;
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
        return view('ServiceRegion.edit', compact('serviceRegion', 'serviceTypes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'            => 'required|string',
            'description'     => 'required|string',
            'reason'          => 'required|string',
            'service_type_id' => 'required|exists:service_types,id',
            'banner_file_detail_id' => 'required|id',
            'dahboard_file_detail_id' => 'required|id',
            'banner_file'     => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'dashboard_file'  => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);
        $entity = [
            'name' => $data['name'],
            'description' => $data['description'],
            'reason' => $data['reason'],
            'service_type_id' => $data['service_type_id'],
            'banner_file_detail_id' => $data['service_type_id'],
            'dahboard_file_detail_id' => $data['service_type_id'],
        ];
        if ($request->hasFile('banner_file')) {
            $entity['banner_file_detail_id'] = $this->mediaRepository->storeSingle($data['banner_file'], 'ServiceRegion/{$id}');
        }
        if ($request->hasFile('dashboard_file')) {
            $entity['dahboard_file_detail_id'] = $this->mediaRepository->storeSingle($data['dashboard_file'], 'ServiceRegion/{$id}');
        }
        $this->serviceTypeRepository->update($id, $entity);
        return redirect()->route('ServiceType.index')->with('success', 'Service Type updated successfully.');
    }

    public function delete($id)
    {
        $this->serviceRegionRepository->delete($id);
        return redirect()->route('ServiceRegion.index')->with('success', 'Service Region deleted successfully.');
    }

    public function faqForm($id = null, Request $request)
    {
        if ($id) {
            $faq = $this->serviceRegionFAQRepository->findOrFail($id);
            return view('ServiceRegion.faq_form', compact('faq'));
        }

        // For creating a new FAQ, expect service_region_id to be provided.
        $serviceRegionId = $request->input('service_region_id');
        return view('ServiceRegion.faq_form', compact('serviceRegionId'));
    }

    public function storeFAQ(Request $request, $service_region)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
        ]);

        $faq =  $this->serviceRegionFAQRepository->create([
            'service_region_id' => $service_region,
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
        return response()->json(['faq' => $faq], 200);
    }

    public function updatefaq(Request $request, $service_region, $id)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
        ]);
        $faqData = $this->serviceRegionFAQRepository->update($id, [
            'id' => $id,
            'service_region_id' => $service_region,
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
        return response()->json(['faq' => $faqData], 200);
    }
}
