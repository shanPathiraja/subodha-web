<?php

namespace Tests\Unit;

use App\Paper;
use Tests\TestCase;
use Illuminate\Support\Str;

class PaperTest extends TestCase
{
    /** @test */
    public function it_requires_a_title()
    {
        $this->signIn();

        $paper = [
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/papers', $paper)
            ->assertStatus(302)
            ->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function it_requires_a_body()
    {
        $this->signIn();

        $paper = [
            'title' => $this->faker->sentence(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/papers', $paper)
            ->assertStatus(302)
            ->assertSessionHasErrors(['body']);
    }

    /** @test */
    public function it_requires_a_category()
    {
        $this->signIn();

        $paper = [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'published' => true,
        ];

        $this->post('/papers', $paper)
            ->assertStatus(302)
            ->assertSessionHasErrors(['category_id']);
    }

    /** @test */
    public function it_generates_a_slug_on_submission()
    {
        $this->signIn();

        $title = $this->faker->sentence();

        $paper = [
            'title' => $title,
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'category_id' => 1,
            'published' => true,
        ];

        $this->post('/papers', $paper);

        $savedPaper = Paper::whereTitle($paper['title'])->first();

        $this->assertEquals(Str::slug($title), $savedPaper->slug);
    }
}
