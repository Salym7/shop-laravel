<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('product.create', compact('tags', 'colors', 'categories'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {

        return view('product.show', compact('product'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($tagsIds as $tagsId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagsId,
            ]);
        }
        foreach ($colorsIds as $colorsId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorsId,
            ]);
        }

        return redirect()->route('product.index');
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        return view('product.show', compact('product'));
    }
}
