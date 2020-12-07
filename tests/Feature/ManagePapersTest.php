<?php

namespace Tests\Feature;

use App\Paper;
use App\Category;
use Carbon\Carbon;
use Tests\TestCase;

class ManagePapersTest extends TestCase
{
    /** @test */
    public function a_user_can_filter_papers_by_updated_date()
    {
        $this->signIn();

        $genericPaper = create(Paper::class);

        $oneMonthAgo = Carbon::now()->subMonth();

        $desiredPaper = create(Paper::class, ['updated_at' => $oneMonthAgo]);

        $this->get('/papers?updated=' . $oneMonthAgo)
            ->assertSee($desiredPaper->title)
            ->assertDontSee($genericPaper->title);
    }

    /** @test */
    public function a_user_can_filter_papers_by_publish_status()
    {
        $this->signIn();

        $draftPaper = create(Paper::class, ['published' => false]);

        $publishedPaper = create(Paper::class, ['published' => true]);

        $this->get('/papers?status=published')
            ->assertSee($publishedPaper->title)
            ->assertDontSee($draftPaper->title);

        $this->get('/papers?status=draft')
            ->assertSee($draftPaper->title)
            ->assertDontSee($publishedPaper->title);
    }

    /** @test */
    public function a_user_can_filter_papers_by_category()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $genericPaper = create(Paper::class);
        $desiredCategory = create(Category::class);
        $desiredPaper = create(Paper::class, ['category_id' => $desiredCategory->id]);

        $this->get('/papers/' . $desiredCategory->slug)
            ->assertSee($desiredPaper->title)
            ->assertSee($desiredCategory->name)
            ->assertDontSee($genericPaper->title);
    }
}
