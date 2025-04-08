<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\PackageDetailRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $packageDetailRepository;

    public function __construct(PackageDetailRepository $packageDetailRepository)
    {
        $this->packageDetailRepository = $packageDetailRepository;
    }

    public function index()
    {
        $packageList = $this->packageDetailRepository->packageList();
        return view("Client.Home.index", compact('packageList'));
    }

    public function detail($id)
    {
        $packageDetail = $this->packageDetailRepository->packageDetail($id);
        return view("client.Detail.detail", compact('packageDetail'));
    }
}
