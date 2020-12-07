<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Filters\PostFilter;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, PostFilter $filters)
    {
        return view('posts.index', [
            'categories' => Category::all(),
            'posts' => $this->getPosts($category, $filters),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
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
    public function store(PostRequest $request)
    {
        $post = user()->posts()->create($request->validated());

        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post                $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
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
        $posts = Post::whereUserId(user('id'))
            ->search(request('search'))
            ->filter($filters)
            ->with('category');

        foreach ($posts as $post) {
            if (!$post->category->exists) {
                $post->category_id = 1;
            }
        }

        if ($category->exists) {
            $posts->where('category_id', $category->id);
        }

        return $posts->paginate(10);
    }
}
