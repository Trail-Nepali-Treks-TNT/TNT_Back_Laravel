<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\PackageDetailRepository;
use App\Repositories\ServiceRegionRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $packageDetailRepository;
    protected $serviceRegionRepository;

    public function __construct(PackageDetailRepository $packageDetailRepository, ServiceRegionRepository $serviceRegionRepository)
    {
        $this->packageDetailRepository = $packageDetailRepository;
        $this->serviceRegionRepository = $serviceRegionRepository;
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
        return view("Client.About.index");
    }
    //TODO: Pass package region slug to view list based on slug eg: /package-list/{slug}
    public function packageList()
    {
        return view("Client.PackageList.index");
    }
}
