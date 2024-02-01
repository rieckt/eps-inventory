<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

use App\Traits\Searchable;
use App\Traits\FetchesModels;

class CategoryController extends Controller
{
    use Searchable;
    use FetchesModels;

    public function index(Request $request)
    {
        $categories = Category::when($request->get('search'), function ($query, $search) {
            return $this->applySearch($query, $search, 'name');
        })->paginate();
        return view('category.index', compact('categories'));
    }

    public function create(Category $category)
    {
        return view('category.create', compact('category'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect()->route('category.show', $category);
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('category.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
