<?php

namespace Tests\Unit;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_requires_a_name()
    {
        $this->signIn();

        $this->post('/categories', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['name']);

        $category = ['name' => $this->faker->word];

        $this->post('/categories', $category)->assertStatus(200);
    }
}
