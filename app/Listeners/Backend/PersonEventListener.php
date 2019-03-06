<?php
namespace App\Listeners\Backend;

/**
 * Class PersonEventListener.
 */
/**
 * Class PersonCreated.
 */
class PersonEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Person Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Person  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Person Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Person\PersonCreated::class,
            'App\Listeners\Backend\PersonEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Person\PersonUpdated::class,
            'App\Listeners\Backend\PersonEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Person\PersonDeleted::class,
            'App\Listeners\Backend\PersonEventListener@onDeleted'
        );
    }
}
