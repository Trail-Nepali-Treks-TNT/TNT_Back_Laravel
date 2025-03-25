<?php

namespace App\Http\Controllers\Web;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\PackageInclusionRepository;
use Illuminate\Http\Request;

class PackageInclusionController extends Controller
{
    protected $packageInclusionRepository;
    public function __construct(PackageInclusionRepository $packageInclusionRepository)
    {
        $this->packageInclusionRepository = $packageInclusionRepository;
    }

    public function index($package_id)
    {
        $packageInclusions = $this->packageInclusionRepository->findWhere(['package_details_id' => $package_id, 'is_active' => 1]);
        return view('PackageInclusion.index', compact('packageInclusions'));
    }

    public function inclusionForm($package_id, $id = null)
    {
        $inclusion = null;
        if ($id)
            $inclusion = $this->packageInclusionRepository->findOrFail($id);
        return view('PackageInclusion.inclusion_form', compact('inclusion'));
    }

    public function store($package_id, Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'is_included' => 'boolean', // Ensures it's a valid boolean (true/false)
        ]);

        $inclusion =  $this->packageInclusionRepository->create([
            'package_details_id' => $package_id,
            'name' => $data['name'],
            'description' => $data['description'],
            'is_included' => $data['is_included'],
        ]);
        return ApiResponseHelper::success($inclusion, "Created Successfully!");
    }

    public function update($package_id, Request $request, $id)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'is_included' => 'boolean', // Ensures it's a valid boolean (true/false)
        ]);

        $inclusion = $this->packageInclusionRepository->update($id, [
            'package_details_id' => $package_id,
            'name' => $data['name'],
            'description' => $data['description'],
            'is_included' => $data['is_included'],
        ]);
        return ApiResponseHelper::success($inclusion, "Updated Successfully!");
    }
}