<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductHeads;
use Illuminate\Http\Request;
use app\Http\Requests\CreateProductRequest;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $products = Product::all();
        $products_head = ProductHeads::all();
        error_log($products_head);
        return inertia::render("Products/products", ["data" => $products, "head" => $products_head]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pcode' => 'required|string|max:255|unique:' . Product::class,
            
        ]);

        $product = Product::create([
            'name'=> $request->name,
            'pcode'=> $request->pcode,
        ]);

        return ;

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
