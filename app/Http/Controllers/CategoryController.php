<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        return view('category.show', compact('category'));
    }
}
