<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Event;
use App\Paper;
use App\Profile;
use App\Activity;
use App\Announcement;
use Illuminate\Support\Str;
use App\Http\Requests\ProfileRequest;

class PublicPageController extends Controller
{
    /**
     * Display landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::wherePublished(true)
            ->orderBy('date', 'desc')
            ->with('category')
            ->take(3)
            ->get();

        $paper = Paper::wherePublished(true)
            ->orderBy('date', 'desc')
            ->with('category')
            ->take(3)
            ->get();

        $recent = Activity::where('user_id', 1)
            ->latest()
            ->with('subject')
            ->take(7)
            ->get()
            ->filter(function ($activity) {
                return Str::contains($activity->type, 'created');
            });

        $announcements = Announcement::where('published', true)
            ->latest()
            ->take(5)
            ->get();

        return view('welcome', [
            'posts'  => $post,
            'papers' => $paper,
            'recent' => $recent,
            'announcements' => $announcements,
        ]);
    }

    /**
     * Show about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(?string $page = null)
    {
        if ($page) {
            return view($page);
        }

        return view('about', [
            'subodha' => User::whereName('Subodha Charles')
                ->with('profile')
                ->first(),
            'work' => Event::whereType('work')
                ->orderBy('id', 'asc')
                ->get(),
            'awards' => Event::whereType('award')
                ->orderBy('id', 'asc')
                ->get(),
        ]);
    }

    /**
     * Update user profile details.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Profile             $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $profile->update($request->validated());

        if ($request->wantsJson()) {
            return response([], 200);
        }
    }

    /**
     * Show resumé.
     *
     * @return \Illuminate\Http\Response
     */
    public function resume()
    {
        return response()->file(public_path('docs/resume.pdf'));
    }

    /**
     * Show entrepreneur page.
     *
     * @return \Illuminate\Http\Response
     */
    public function entrepreneur()
    {
        return view('entrepreneur');
    }


    /**
     * Show volunteer page.
     *
     * @return \Illuminate\Http\Response
     */
    public function volunteer()
    {
        return view('volunteer');
    }
}
