<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return Category::latest()->get();
        }

        return view('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CategoryRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return response(['category' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CategoryRequest $request
     * @param \App\Category                      $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if ('Uncategorized' !== $category->name) {
            $category->update($request->validated());
        }

        return response(['category' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ('Uncategorized' !== $category->name) {
            $category->delete();
        }

        return response([], 204);
    }
}
