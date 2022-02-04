<?php

namespace App\Http\Controllers;

use App\Post;
// use Analytics;
use App\Paper;
use App\Activity;
// use Spatie\Analytics\Period;

class HomeController extends Controller
{
    /**
     * Total number of visitors to the site.
     *
     * @var int
     */
    protected int $totalVisits = 0;

    /**
     * Total number of page views of site.
     *
     * @var int
     */
    protected int $totalPageViews = 0;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('home', [
            'analytics' => [
                'visitors' => $this->getVisitorData(),
                'totalVisits' => $this->totalVisits,
                'totalViews' => $this->totalPageViews,
                'papers' => [
                    'count' => Paper::whereUserId(user('id'))->count(),
                    'published' => Paper::whereUserId(user('id'))->wherePublished(true)->count(),
                ],
                'posts' => [
                    'count' => Post::whereUserId(user('id'))->count(),
                    'published' => Post::whereUserId(user('id'))->wherePublished(true)->count(),
                ],
            ],
            'activities' => Activity::feed(user('id'), 'user_id', 7),
        ]);
    }

    /**
     * Show actvity log.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function activities()
    {
        return view('activities', [
            'activities' => Activity::feed(user('id'), 'user_id', 100),
        ]);
    }

    /**
     * Convert google analytics data to graphable form.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getVisitorData()
    {
        $plucked = [];

        // $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));

        // $this->totalVisits = array_reduce(
        //     $analyticsData->toArray(),
        //     function ($carry, $day) {
        //         $carry += $day['visitors'];

        //         return $carry;
        //     }
        // );

        // $this->totalPageViews = array_reduce(
        //     $analyticsData->toArray(),
        //     function ($carry, $day) {
        //         $carry += $day['pageViews'];

        //         return $carry;
        //     }
        // );

        // foreach (array_merge_recursive($analyticsData->toArray()) as $day) {
        //     $plucked[$day['date']->format('M j')] = $day['visitors'];
        // }

        return collect(array_reverse($plucked));
    }
}
