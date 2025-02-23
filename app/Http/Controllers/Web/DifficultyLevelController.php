<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\DifficultyLevelRepository;
use Illuminate\Http\Request;

class DifficultyLevelController extends Controller
{
    protected $difficultyLevelRepository;

    public function __construct(DifficultyLevelRepository $difficultyLevelRepository)
    {
        $this->difficultyLevelRepository = $difficultyLevelRepository;
    }

    public function index()
    {
        $difficultyLevels = $this->difficultyLevelRepository->paginate(10);
        return view('DifficultyLevel.index', compact('difficultyLevels'));
    }

    public function create()
    {
        return view('DifficultyLevel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->difficultyLevelRepository->create($validatedData);

        return redirect()->route('DifficultyLevel.index')->with('success', 'Difficulty Level created successfully.');
    }

    public function edit($id)
    {
        $difficultyLevel = $this->difficultyLevelRepository->findOrFail($id);
        return view('DifficultyLevel.edit', compact('difficultyLevel'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->difficultyLevelRepository->update($id, $validatedData);

        return redirect()->route('DifficultyLevel.index')->with('success', 'Difficulty Level updated successfully.');
    }

    public function delete($id)
    {
        $this->difficultyLevelRepository->delete($id);
        return redirect()->route('DifficultyLevel.index')->with('success', 'Difficulty Level deleted successfully.');
    }

}
