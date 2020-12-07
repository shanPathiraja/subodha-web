<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\EventRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = user()->events()->create($request->validated());

        return response(['event' => $event], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EventRequest $request
     * @param \App\Event                      $event
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return response(['event' => $event->refresh()], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response([], 200);
    }
}
