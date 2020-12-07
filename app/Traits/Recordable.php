<?php

namespace App\Traits;

use App\Activity;
use ReflectionClass;

trait Recordable
{
    /**
     * Boot the trait.
     */
    protected static function bootRecordable()
    {
        if (auth()->guest()) {
            return;
        }

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }

        static::deleting(function ($model) {
            $model->activity()->delete();
        });
    }

    /**
     * Fetch all model events that require activity recording.
     *
     * @return array
     */
    protected static function getActivitiesToRecord()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

        return ['created', 'updated'];
    }

    /**
     * Record new activity for the model.
     *
     * @param string     $event
     * @param mixed|null $userId
     */
    protected function recordActivity($event, $userId = null)
    {
        $this->activity()->create([
            'user_id' => $userId ?? user('id'),
            'type' => $this->getActivityType($event),
        ]);
    }

    /**
     * Fetch the activity relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    /**
     * Determine the activity type.
     *
     * @param string $event
     *
     * @return string
     */
    protected function getActivityType($event)
    {
        return "{$event}_{$this->getType()}";
    }

    /**
     * Get model name in lowercase.
     *
     * @return string
     */
    protected function getType(): string
    {
        return strtolower((new ReflectionClass($this))->getShortName());
    }
}
