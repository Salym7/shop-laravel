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
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();
        return view('product.edit', compact('product', 'categories', 'tags', 'colors'));
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        $tags = Tag::all();
        return view('product.show', compact('product',  'tags'));
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
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            if (Storage::disk('public')->exists($product->preview_image)) {
                Storage::disk('public')->delete($product->preview_image);
            }
        } else {
            $data['preview_image'] = $product->preview_image;
        }
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product->update($data);
        ProductTag::where('product_id', $product->id)->delete();
        foreach ($tagsIds as $tagsId) {
            ProductTag::create([
                'product_id' => $product->id,
                'tag_id' => $tagsId,
            ]);
        }
        ColorProduct::where('product_id', $product->id)->delete();
        foreach ($colorsIds as $colorsId) {
            ColorProduct::create([
                'product_id' => $product->id,
                'color_id' => $colorsId,
            ]);
        }

        return view('product.show', compact('product'));
    }
}
