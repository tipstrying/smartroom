<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $products = Product::all();
        $root = [];
        $c_root = Category::where("level", 0)->get();
        $root['data'] = $c_root->first();
        $root['child'] = [];
        $c_1 = Category::where("level", 1)->get();

        if ($c_1->count() > 0) {

            foreach ($c_1 as $c) {
                $tmp = [];
                $tmp['data'] = $c;


                $c_tmp = Category::where("level", 2)->where('fcode', $c->ccode)->get();
                $tmp['child'] = $c_tmp;
                array_push($root['child'], $tmp);
            }
        }
        return inertia::render("Products/products", ["data" => $products, "head" => $products_head, "category"=>$root]);
    }
    public function get(Product $product)
    {
        $products_head = ProductHeads::all();
        return inertia::render("Products/products", ["data" => [$product], "head" => $products_head]);
    }
    public function getByCategory(Category $category)
    {
        $root = [];
        $c_root = Category::where("level", 0)->get();
        $root['data'] = $c_root->first();
        $root['child'] = [];
        $c_1 = Category::where("level", 1)->get();

        if ($c_1->count() > 0) {

            foreach ($c_1 as $c) {
                $tmp = [];
                $tmp['data'] = $c;


                $c_tmp = Category::where("level", 2)->where('fcode', $c->ccode)->get();
                $tmp['child'] = $c_tmp;
                array_push($root['child'], $tmp);
            }
        }

        $products_head = ProductHeads::all();
        $products = Product::where("ccode", $category->only("ccode"))->get();
        return inertia::render("Products/products", ["data" => $products, "head" => $products_head, 'category'=>$root]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return inertia::render('Products/Create', ['categories' => $categories, 'product'=> null]);
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
            Product::create($request->all());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route('product');

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
        $categories = Category::where('level',2)->get();
        return inertia::render('Products/Create', ['categories' => $categories, 'product'=> $product]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, Product $product)
    {
        $product->save($request->all());
        return redirect('/product');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $p = Product::where('pcode', $product->pcode)->delete();
        return redirect('/product');
        //
    }
}
