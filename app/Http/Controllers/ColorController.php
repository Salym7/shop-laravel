<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function create()
    {
        return view('color.create');
    }
    public function delete(Color $color)
    {
        $color->delete();
        return redirect()->route('color.index');
    }
    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }
    public function index()
    {
        $colors = Color::all();
        return view('color.index', compact('colors'));
    }
    public function show(Color $color)
    {
        return view('color.show', compact('color'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);
        return redirect()->route('color.index');
    }
    public function update(UpdateRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);

        return view('color.show', compact('color'));
    }
}
