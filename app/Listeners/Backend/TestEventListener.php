<?php
namespace App\Listeners\Backend;

/**
 * Class TestEventListener.
 */
/**
 * Class TestCreated.
 */
class TestEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Test Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Test  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Test Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Test\TestCreated::class,
            'App\Listeners\Backend\TestEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Test\TestUpdated::class,
            'App\Listeners\Backend\TestEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Test\TestDeleted::class,
            'App\Listeners\Backend\TestEventListener@onDeleted'
        );
    }
}
