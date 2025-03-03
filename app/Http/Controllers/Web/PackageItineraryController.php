<?php

namespace App\Http\Controllers\Web;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\PackageItineraryRepository;
use Illuminate\Http\Request;

class PackageItineraryController extends Controller
{
    protected $packageItineraryRepository;
    public function __construct(PackageItineraryRepository $packageItineraryRepository)
    {
        $this->packageItineraryRepository = $packageItineraryRepository;
    }

    public function index($package_id)
    {
        $packageItineraries = $this->packageItineraryRepository->findWhere(['package_details_id' => $package_id, 'is_active' => 1]);
        return view('PackageItinerary.index', compact('packageItineraries'));
    }

    public function itineraryForm($package_id, $id = null)
    {
        $itinerary = null;
        if ($id)
            $itinerary = $this->packageItineraryRepository->findOrFail($id);
        return view('PackageItinerary.itinerary_form', compact('itinerary'));
    }

    public function store($package_id, Request $request)
    {
        $data = $request->validate([
            'day'          => 'required|integer|min:1',  // Ensure 'day' is a positive integer
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'longitude'    => 'required|numeric|between:-180,180', // Ensure valid longitude
            'latitude'     => 'required|numeric|between:-90,90',   // Ensure valid latitude
        ]);
        $itinerary =  $this->packageItineraryRepository->create([
            'package_details_id' => $package_id,
            'day' => $data['day'],
            'name' => $data['name'],
            'description' => $data['description'],
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
        ]);
        return ApiResponseHelper::success($itinerary, "Created Successfully!");
    }

    public function update($package_id, Request $request, $id)
    {
        $data = $request->validate([
            'day'          => 'required|integer|min:1',  // Ensure 'day' is a positive integer
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'longitude'    => 'required|numeric|between:-180,180', // Ensure valid longitude
            'latitude'     => 'required|numeric|between:-90,90',   // Ensure valid latitude
        ]);

        $itinerary = $this->packageItineraryRepository->update($id, [
            'package_details_id' => $package_id,
            'day' => $data['day'],
            'name' => $data['name'],
            'description' => $data['description'],
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
        ]);
        return ApiResponseHelper::success($itinerary, "Updated Successfully!");
    }
}
