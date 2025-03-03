<?php

namespace App\Http\Controllers\Web;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\AccomodationRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DifficultyLevelRepository;
use App\Repositories\FileMappingRepository;
use App\Repositories\MediaRepository;
use App\Repositories\PackageAccomodationRepository;
use App\Repositories\PackageDetailRepository;
use App\Repositories\ServiceRegionRepository;
use Illuminate\Http\Request;

class PackageDetailController extends Controller
{
    protected $packageDetailRepository;
    protected $packageAccomodationRepository;
    protected $difficultyLevelRepository;
    protected $serviceRegionRepository;
    protected $categoryRepository;
    protected $accomodationRepository;
    protected $mediaRepository;
    protected $fileMappingRepository;

    public function __construct(
        PackageDetailRepository $packageDetailRepository,
        PackageAccomodationRepository $packageAccomodationRepository,
        DifficultyLevelRepository $difficultyLevelRepository,
        ServiceRegionRepository $serviceRegionRepository,
        CategoryRepository $categoryRepository,
        AccomodationRepository $accomodationRepository,
        MediaRepository $mediaRepository,
        FileMappingRepository $fileMappingRepository,
    ) {
        $this->packageDetailRepository = $packageDetailRepository;
        $this->packageAccomodationRepository = $packageAccomodationRepository;
        $this->difficultyLevelRepository = $difficultyLevelRepository;
        $this->serviceRegionRepository = $serviceRegionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->accomodationRepository = $accomodationRepository;
        $this->mediaRepository = $mediaRepository;
        $this->fileMappingRepository = $fileMappingRepository;
    }

    public function index()
    {
        $packageList = $this->packageDetailRepository->paginate(10);
        return view('PackageDetail.index', compact('packageList'));
    }

    public function create()
    {
        $difficultyLevels = $this->difficultyLevelRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $difficultyLevels = $this->difficultyLevelRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $serviceRegions = $this->serviceRegionRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $categories = $this->categoryRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $accomodations = $this->accomodationRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        return view('PackageDetail.create', compact('difficultyLevels', 'serviceRegions', 'categories', 'accomodations'));
    }

    public function store(Request $request)
    {
        // Validate regular fields, file inputs, and the service type selection.
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'short_description'     => 'required|string|max:500',
            'description'           => 'required|string',
            'price'                 => 'required|numeric|min:0',
            'old_price'             => 'required|numeric|min:0',
            'duration'              => 'required|integer|min:1',
            'walking_per_day'       => 'required|string',
            'starting_point'        => 'required|string|max:255',
            'availability'          => 'required|string|max:255',
            'total_distance'        => 'required|string|max:255',
            'max_elevation'         => 'required|string|max:255',
            'category_id'           => 'required|exists:category,id',
            'difficulty_level_id'   => 'required|exists:difficulty_levels,id',
            'service_region_id'     => 'required|exists:service_regions,id',
            'package_accommodation' => 'required|array',
            'package_accommodation.*' => 'exists:accomodation,id'
        ]);

        $entity = [
            'name'                => $data['name'],
            'short_description'   => $data['short_description'],
            'description'         => $data['description'],
            'price'               => $data['price'],
            'old_price'           => $data['old_price'],
            'duration'            => $data['duration'],
            'walking_per_day'     => $data['walking_per_day'],
            'starting_point'      => $data['starting_point'],
            'availability'        => $data['availability'],
            'total_distance'      => $data['total_distance'],
            'max_elevation'       => $data['max_elevation'],
            'category_id'         => $data['category_id'],
            'difficulty_level_id' => $data['difficulty_level_id'],
            'service_region_id'   => $data['service_region_id']
        ];

        $package = $this->packageDetailRepository->create($entity);
        if (!empty($data['package_accommodation'])) {
            $this->packageDetailRepository->updateAccomodation($package->id, $data['package_accommodation']);
        }
        return redirect()->route('PackageDetail.index')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $packageDetail = $this->packageDetailRepository->getDetail($id);
        $difficultyLevels = $this->difficultyLevelRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $difficultyLevels = $this->difficultyLevelRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $serviceRegions = $this->serviceRegionRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $categories = $this->categoryRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        $accomodations = $this->accomodationRepository->findWhere(['is_deleted' => 0, 'is_active' => 1], ["id", "name"]);
        return view('PackageDetail.edit', compact('packageDetail', 'difficultyLevels', 'serviceRegions', 'categories', 'accomodations'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'short_description'     => 'required|string|max:500',
            'description'           => 'required|string',
            'price'                 => 'required|numeric|min:0',
            'old_price'             => 'required|numeric|min:0',
            'duration'              => 'required|integer|min:1',
            'walking_per_day'       => 'required|string',
            'starting_point'        => 'required|string|max:255',
            'availability'          => 'required|string|max:255',
            'total_distance'        => 'required|string|max:255',
            'max_elevation'         => 'required|string|max:255',
            'category_id'           => 'required|exists:category,id',
            'difficulty_level_id'   => 'required|exists:difficulty_levels,id',
            'service_region_id'     => 'required|exists:service_regions,id',
            'package_accommodation' => 'required|array',
            'package_accommodation.*' => 'exists:accomodation,id'
        ]);

        $entity = [
            'name'                => $data['name'],
            'short_description'   => $data['short_description'],
            'description'         => $data['description'],
            'price'               => $data['price'],
            'old_price'           => $data['old_price'],
            'duration'            => $data['duration'],
            'walking_per_day'     => $data['walking_per_day'],
            'starting_point'      => $data['starting_point'],
            'availability'        => $data['availability'],
            'total_distance'      => $data['total_distance'],
            'max_elevation'       => $data['max_elevation'],
            'category_id'         => $data['category_id'],
            'difficulty_level_id' => $data['difficulty_level_id'],
            'service_region_id'   => $data['service_region_id']
        ];
        $this->packageDetailRepository->update($id, $entity);
        if (!empty($data['package_accommodation'])) {
            $this->packageDetailRepository->updateAccomodation($id, $data['package_accommodation']);
        }
        return ApiResponseHelper::success(null, "Package updated successfully.");
    }

    public function Image($package_id)
    {
        $packageImages = $this->fileMappingRepository->getFiles($package_id, 'Package');
        return view('PackageDetail.package_image', compact('packageImages'));
    }

    public function uploadImage($package_id, Request $request)
    {
        $ids = $this->mediaRepository->storeMultiple($request['files'], 'Package/{$package_id}');
        foreach ($ids as $key => $value) {
        }
    }
}
