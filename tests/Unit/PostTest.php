<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Support\Str;

class PostTest extends TestCase
{
    /** @test */
    public function it_requires_a_title()
    {
        $this->signIn();

        $post = [
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/posts', $post)
            ->assertStatus(302)
            ->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function it_requires_a_body()
    {
        $this->signIn();

        $post = [
            'title' => $this->faker->sentence(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/posts', $post)
            ->assertStatus(302)
            ->assertSessionHasErrors(['body']);
    }

    /** @test */
    public function it_requires_a_category()
    {
        $this->signIn();

        $post = [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'published' => true,
        ];

        $this->post('/posts', $post)
            ->assertStatus(302)
            ->assertSessionHasErrors(['category_id']);
    }

    /** @test */
    public function it_generates_a_slug_on_submission()
    {
        $this->signIn();

        $title = $this->faker->sentence();

        $post = [
            'title' => $title,
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/posts', $post);

        $savedPost = Post::whereTitle($post['title'])->first();

        $this->assertEquals(Str::slug($title), $savedPost->slug);
    }
}
