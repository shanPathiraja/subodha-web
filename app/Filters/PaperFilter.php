<?php

namespace App\Filters;

use Carbon\Carbon;

class PaperFilter extends Filter
{
    /**
     * Attributes to filters from.
     *
     * @var array
     */
    protected $filters = ['updated', 'status'];

    /**
     * Filter the query by last updated date.
     *
     * @param string $date
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function updated(string $date)
    {
        return $this->builder->whereDate('updated_at', 'like', Carbon::parse($date));
    }

    /**
     * Filter the query by published status.
     *
     * @param string $state
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function status(string $state)
    {
        if ('published' === $state) {
            return $this->builder->wherePublished(true);
        }

        return $this->builder->wherePublished(false);
    }
}
