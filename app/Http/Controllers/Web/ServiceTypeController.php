<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceTypeRepository;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    protected $serviceTypeRepository;

    public function __construct(ServiceTypeRepository $serviceTypeRepository)
    {
        $this->serviceTypeRepository = $serviceTypeRepository;
    }

    public function index()
    {
        $serviceTypes = $this->serviceTypeRepository->paginate(10);
        return view('ServiceType.index', compact('serviceTypes'));
    }

    public function create()
    {
        return view('ServiceType.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->serviceTypeRepository->create($validatedData);

        return redirect()->route('ServiceType.index')->with('success', 'Service Type created successfully.');
    }

    public function edit($id)
    {
        $ServiceType = $this->serviceTypeRepository->findOrFail($id);
        return view('ServiceType.edit', compact('ServiceType'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->serviceTypeRepository->update($id, $validatedData);

        return redirect()->route('ServiceType.index')->with('success', 'Service Type updated successfully.');
    }

    public function delete($id)
    {
        $this->serviceTypeRepository->delete($id);
        return redirect()->route('ServiceType.index')->with('success', 'Service Type deleted successfully.');
    }
}
