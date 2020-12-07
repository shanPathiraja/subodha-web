<?php

namespace App\Http\Controllers;

use App\Paper;
use App\Category;
use App\Filters\PaperFilter;
use App\Http\Requests\PaperRequest;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, PaperFilter $filters)
    {
        return view('papers.index', [
            'categories' => Category::all(),
            'papers' => $this->getPapers($category, $filters),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('papers.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PaperRequest $request)
    {
        user()->papers()->create(
            array_merge(
                $request->validated(),
                ['authors' => explode(',', $request->authors)]
            )
        );

        return redirect()->route('papers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Paper $paper
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        return view('papers.edit', [
            'paper' => $paper,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Paper               $paper
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PaperRequest $request, Paper $paper)
    {
        $paper->update(
            array_merge(
                $request->validated(),
                ['authors' => explode(',', $request->authors)]
            )
        );

        return redirect()->route('papers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Paper $paper
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        $paper->delete();

        return redirect()->route('papers.index');
    }

    /**
     * Fetch all relevant papers.
     *
     * @param \App\Category            $category
     * @param \App\Filters\PaperFilter $filters
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getPapers(Category $category, PaperFilter $filters)
    {
        $papers = Paper::whereUserId(user('id'))
            ->search(request('search'))
            ->filter($filters)
            ->with('category')
            ->latest();

        foreach ($papers as $paper) {
            if (! $paper->category->exists) {
                $paper->category_id = 1;
            }
        }

        if ($category->exists) {
            $papers->where('category_id', $category->id);
        }

        return $papers->paginate(10);
    }
}
