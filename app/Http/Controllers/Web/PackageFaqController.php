<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\PackageFaqRepository;
use Illuminate\Http\Request;

class PackageFaqController extends Controller
{
    protected $packageFaqRepository;
    public function __construct(PackageFaqRepository $packageFaqRepository)
    {
        $this->packageFaqRepository = $packageFaqRepository;
    }

    public function index($package_id)
    {
        $packageFaqList = $this->packageFaqRepository->findWhere(['package_details_id' => $package_id, 'is_active' => 1]);
        return view('PackageFaq.index', compact('packageFaqList'));
    }

    public function faqForm($package_id, $id = null)
    {
        $faq = null;
        if ($id)
            $faq = $this->packageFaqRepository->findOrFail($id);
        return view('PackageFaq.package_faq_form', compact('faq'));
    }

    public function store($package_id, Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
        ]);

        $faq =  $this->packageFaqRepository->create([
            'package_details_id' => $package_id,
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
        return response()->json(['faq' => $faq], 200);
    }

    public function update($package_id, $id,Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
        ]);
        $faqData = $this->packageFaqRepository->update($id, [
            'package_details_id' => $package_id,
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
        return response()->json(['faq' => $faqData], 200);
    }
}
