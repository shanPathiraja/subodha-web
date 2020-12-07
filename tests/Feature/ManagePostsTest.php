<?php

namespace Tests\Feature;

use App\Post;
use App\Category;
use Carbon\Carbon;
use Tests\TestCase;

class ManagePostsTest extends TestCase
{
    /** @test */
    public function a_user_can_filter_posts_by_updated_date()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $genericPost = create(Post::class);

        $oneMonthAgo = Carbon::now()->subMonth();

        $desiredPost = create(Post::class, ['updated_at' => $oneMonthAgo]);

        $this->get('/posts?updated=' . $oneMonthAgo)
            ->assertSee($desiredPost->title)
            ->assertDontSee($genericPost->title);
    }

    /** @test */
    public function a_user_can_filter_posts_by_publish_status()
    {
        $this->signIn();

        $draftPost = create(Post::class, ['published' => false]);

        $publishedPost = create(Post::class, ['published' => true]);

        $this->get('/posts?status=published')
            ->assertSee($publishedPost->title)
            ->assertDontSee($draftPost->title);

        $this->get('/posts?status=draft')
            ->assertSee($draftPost->title)
            ->assertDontSee($publishedPost->title);
    }

    /** @test */
    public function a_user_can_filter_posts_by_category()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $genericPost = create(Post::class);
        $desiredCategory = create(Category::class);
        $desiredPost = create(Post::class, ['category_id' => $desiredCategory->id]);

        $this->get('/posts/' . $desiredCategory->slug)
            ->assertSee($desiredPost->title)
            ->assertSee($desiredCategory->name)
            ->assertDontSee($genericPost->title);
    }
}
