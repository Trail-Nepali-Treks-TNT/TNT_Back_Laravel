<?php

namespace App\Http\Controllers\Web;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\BookingRepository;
use App\Repositories\PackageDetailRepository;
use App\Repositories\ServiceRegionRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $packageDetailRepository;
    protected $serviceRegionRepository;
    protected $bookingRepository;

    public function __construct(
        PackageDetailRepository $packageDetailRepository,
        ServiceRegionRepository $serviceRegionRepository,
        BookingRepository $bookingRepository
    ) {
        $this->packageDetailRepository = $packageDetailRepository;
        $this->serviceRegionRepository = $serviceRegionRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function index()
    {
        $packageList = $this->packageDetailRepository->packageList();
        return view("Client.Home.index", compact('packageList'));
    }

    public function search($id, Request $request)
    {
        $filters = $request->only([
            'search',
            'category',
            'difficulty_level',
            'accommodations'
        ]);
        $regionDetailWithPackage = $this->serviceRegionRepository->RegionDetail($id);
        $regionDetailWithPackage['packageList'] = $this->packageDetailRepository->searchList($id, $filters);
        return view("Client.Search.index", compact('regionDetailWithPackage'));
    }

    public function searchAjax($id, Request $request)
    {
        $filters = $request->only([
            'search',
            'category',
            'difficulty_level',
            'accommodations'
        ]);
        $packageList = $this->packageDetailRepository->searchList($id, $filters);
        return view("Client.Home.search", compact('packageList'));
    }

    public function detail($slugURL)
    {
        $packageDetail = $this->packageDetailRepository->packageDetailBySlug($slugURL);
        return view("client.Detail.detail", compact('packageDetail'));
    }
    public function aboutUs()
    {
        $packageList = $this->packageDetailRepository->packageList();
        return view("Client.About.index");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id'    => 'nullable|integer', // <-- this will use 0 if null
            'full_name'     => 'required|string|min:2',
            'email'         => 'required|email',
            'phone'         => 'nullable|string|regex:/^\+?[0-9\s\-]{7,15}$/',
            'travel_date'   => 'required|date|after_or_equal:today',
            'guests'        => 'required|integer|min:1',
            'message'       => 'nullable|string',
            'package_name'  => 'nullable|string|max:255',
            'consent'       => 'accepted',
        ]);

        // Save to database
        $entity = [
            'package_id'    => $validated['package_id'] ?? 0,
            'full_name'     => $validated['full_name'],  
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'travel_date'   => $validated['travel_date'],
            'guests'        => $validated['guests'],
            'message'       => $validated['message'] ?? null,
            'package_name'  => $validated['package_name'] ?? 'Generic Inquiry',
        ];

        $this->bookingRepository->create($entity);
        return ApiResponseHelper::success(null, "Booking placed successfully.");
    }
}
