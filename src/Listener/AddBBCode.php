<?php
/*
 * (c) Sajjad Hashemian <wolaws@gmail.com>
 */

namespace Sijad\Spoiler\Alert\Listener;

use Flarum\Formatter\Event\Configuring;
use Illuminate\Contracts\Events\Dispatcher;

class AddBBCode
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Configuring::class, [$this, 'addBBCode']);
    }

    /**
     * @param Configuring $event
     */
    public function addBBCode(Configuring $event)
    {
        // $event->configurator->BBCodes->addFromRepository('SPOILER');

        $event->configurator->BBCodes->addCustom(
            '[SPOILER]{TEXT}[/SPOILER]',
            '<div class="spoiler">{TEXT}</div>'
        );
    }
}
