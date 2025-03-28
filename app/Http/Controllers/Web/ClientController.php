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
        return view("client.home.index", compact('packageDetail'));
    }

    public function detail($id)
    {
        $packageDetail = $this->packageDetailRepository->packageDetail($id);
        return view("client.Detail.detail", compact('packageDetail'));
    }
}
