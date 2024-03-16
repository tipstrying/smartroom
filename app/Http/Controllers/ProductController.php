<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\ProductHeads;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products_head = ProductHeads::all();
        $products = product::all();
        return inertia::render("Products/products", ["data" => $products, "head" => $products_head]);
    }
    public function get(product $product)
    {
        $products_head = ProductHeads::all();
        return inertia::render("Products/products", ["data" => [$product], "head" => $products_head]);
    }
    public function getByCategory(Category $category)
    {
        $products_head = ProductHeads::all();
        $products = Product::where("ccode", $category->only("ccode"))->get();
        return inertia::render("Products/products", ["data" => $products, "head" => $products_head]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return inertia::render('Products/Create', ['categories' => $categories]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'pcode' => 'required|string|max:255|unique:products',
                    'ccode' => 'required|string|max:255|exists:categories',
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        try {
            product::create($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }


        //
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
