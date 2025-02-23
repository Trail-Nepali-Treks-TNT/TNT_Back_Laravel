<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\AccomodationRepository;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    protected $accomodationRepository;

    public function __construct(AccomodationRepository $accomodationRepository)
    {
        $this->accomodationRepository = $accomodationRepository;
    }

    public function index()
    {
        $accomodation = $this->accomodationRepository->paginate(10);
        return view('Accomodation.index', compact('accomodation'));
    }

    public function create()
    {
        return view('Accomodation.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->accomodationRepository->create($validatedData);

        return redirect()->route('Accomodation.index')->with('success', 'Accomodation created successfully.');
    }

    public function edit($id)
    {
        $accomodation = $this->accomodationRepository->findOrFail($id);
        return view('Accomodation.edit', compact('accomodation'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->accomodationRepository->update($id, $validatedData);

        return redirect()->route('Accomodation.index')->with('success', 'Accomodation updated successfully.');
    }

    public function delete($id)
    {
        $this->accomodationRepository->delete($id);
        return redirect()->route('Accomodation.index')->with('success', 'Accomodation deleted successfully.');
    }
}
