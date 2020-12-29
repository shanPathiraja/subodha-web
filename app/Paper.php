<?php

namespace App;

use App\Traits\HasImage;
use App\Traits\Sluggable;
use App\Traits\Filterable;
use App\Traits\Recordable;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use Sluggable;
    use Filterable;
    use Recordable;
    use HasImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'image', 'body', 'user_id',
        'category_id', 'published', 'venue', 'authors', 'download_link'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'authors' => 'array',
    ];

    /**
     * Get the user the paper belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category the paper belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Search similar papers.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null                        $terms
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearch($query, string $terms = null)
    {
        collect(explode(' ', $terms))
            ->filter()
            ->each(function ($term) use ($query) {
                $term = '%' . $term . '%';

                $query->where(function ($query) use ($term) {
                    $query->where('title', 'like', $term)
                        ->orWhere('body', 'like', $term)
                        ->orWhereHas('category', function ($query) use ($term) {
                            $query->where('name', 'like', $term)
                                ->orWhere('description', 'like', $term);
                        });
                });
            });
    }

    /**
     * Get full url path to paper.
     *
     * @return string
     */
    public function path()
    {
        return route('publications.paper', $this);
    }
}
