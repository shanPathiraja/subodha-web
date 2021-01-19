<?php

namespace App\Http\Controllers;

use App\Paper;
use App\Category;
use App\Filters\PaperFilter;

class ResearchPaperController extends Controller
{
    /**
     * Get all publications paper.
     *
     * @return \Illuminate\View\View
     */
    public function index(Category $category, PaperFilter $filters)
    {
        return view('publications.papers', [
            'papers' => $this->getPapers($category, $filters),
        ]);
    }

    /**
     * Show given publications paper.
     *
     * @param \App\Paper $paper
     *
     * @return \Illuminate\View\View
     */
    public function show(Paper $paper)
    {
        return view('publications.paper', [
            'paper' => $paper,
            'previous' => Paper::where('id', '<', $paper->id)->first(),
            'next' => Paper::where('id', '>', $paper->id)->first(),
        ]);
    }

    /**
     * Fetch all relevant paper.
     *
     * @param \App\Category            $category
     * @param \App\Filters\PaperFilter $filters
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getPapers(Category $category, PaperFilter $filters)
    {
        $paper = Paper::query()
            ->wherePublished(true)
            ->search(request('search'))
            ->filter($filters)
            ->with('category')
            ->orderBy('date', 'desc');

        foreach ($paper as $paper) {
            if (!$paper->category->exists) {
                $paper->category_id = 1;
            }
        }

        if ($category->exists) {
            $paper->where('category_id', $category->id);
        }

        return $paper->paginate(10);
    }
}
