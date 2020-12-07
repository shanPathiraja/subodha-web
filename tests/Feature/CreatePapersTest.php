<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreatePapersTest extends TestCase
{
    /** @test */
    public function only_authorized_users_can_create_new_papers()
    {
        $this->signIn();

        $paper = [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/papers', $paper)
            ->assertRedirect('/papers')
            ->assertStatus(302);

        $this->get('/papers')->assertSee($paper['title']);

        $this->assertDatabaseHas('papers', $paper);
    }

    /** @test */
    public function create_post_page_cannot_be_accessed_by_unauthorized_users()
    {
        $this->get('/papers/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }
}
