<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    /**
     * Fetch all relevant announcements.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function index()
    {
        $announcements = Announcement::where('published', true)
                ->orderBy('date', 'desc')
                ->paginate(10);

        return view('highlights.index', [
            'announcements' => $announcements,
        ]);
    }
}
