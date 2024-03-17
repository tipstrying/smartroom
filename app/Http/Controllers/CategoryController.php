<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        return inertia::render("Category/Index", ["data" => $root]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('level', '<', 2)->orderByDesc('ccode')->get();
        $ccode = '1000';
        if (count($categories) > 0) {
            $ccode = strval(intval(Category::where('ccode', '!=', '')->orderByDesc('ccode')->first()->only('ccode')['ccode']) + 1);
        }
        return Inertia::render("Category/Register", ["categories" => $categories, "nextcode" => $ccode]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse|Response
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'ccode' => 'required|string|max:255|unique:categories',
            ]);
        } catch (\Exception $e) {
            return inertia::render("Category/RegisterError", ["error" => "参数校验失败:" . $e->getMessage() . $e->getTraceAsString()]);
        }
        try {
            Category::create([
                "name" => $request->name,
                "ccode" => $request->ccode,
                "fcode" => $request->fcode,
                "level" => $request->level,
            ]);
        } catch (\Exception $e) {
            return inertia::render("Category/RegisterError", ["error" => "数据库操作失败:" . $e->getMessage() . $e->getTraceAsString()]);
        }

        return redirect(route('category', absolute: true));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::where('ccode', $category->ccode)->get();
        return inertia::render(
            'Category/Index',
            ["data" => $category]
        );
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
