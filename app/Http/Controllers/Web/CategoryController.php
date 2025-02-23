<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $category = $this->categoryRepository->paginate(10);
        return view('Category.index', compact('category'));
    }

    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->categoryRepository->create($validatedData);

        return redirect()->route('Category.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findOrFail($id);
        return view('Category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->categoryRepository->update($id, $validatedData);

        return redirect()->route('Category.index')->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->route('Category.index')->with('success', 'Category deleted successfully.');
    }
}
