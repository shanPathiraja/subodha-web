<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Filters\PostFilter;

class BlogPostController extends Controller
{
    /**
     * Get all blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index(Category $category, PostFilter $filters)
    {
        return view('blog.posts', [
            'posts' => $this->getPosts($category, $filters),
        ]);
    }

    /**
     * Show given blog post.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('blog.post', [
            'post' => $post,
            'previous' => Post::where('id', '<', $post->id)->first(),
            'next' => Post::where('id', '>', $post->id)->first(),
        ]);
    }

    /**
     * Fetch all relevant posts.
     *
     * @param \App\Category           $category
     * @param \App\Filters\PostFilter $filters
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getPosts(Category $category, PostFilter $filters)
    {
        $posts = Post::query()
            ->wherePublished(true)
            ->search(request('search'))
            ->filter($filters)
            ->with('category')
            ->orderBy('date', 'desc');

        foreach ($posts as $post) {
            if (!$post->category->exists) {
                $post->category_id = 1;
            }
        }

        if ($category->exists) {
            $posts->where('category_id', $category->id);
        }

        return $posts->paginate(12);
    }
}
