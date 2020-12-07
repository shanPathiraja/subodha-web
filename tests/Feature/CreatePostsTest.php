<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    /** @test */
    public function only_authorized_users_can_create_new_posts()
    {
        $this->signIn();

        $post = [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/posts', $post)
            ->assertRedirect('/posts')
            ->assertStatus(302);

        $this->get('/posts')->assertSee($post['title']);

        $this->assertDatabaseHas('posts', $post);
    }

    /** @test */
    public function create_post_page_cannot_be_accessed_by_unauthorized_users()
    {
        $this->get('/posts/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }
}
