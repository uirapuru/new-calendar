<?php

namespace Calendar;

use DateTime;
use Doctrine\Common\Collections\Collection;

class Calendar
{
    /** @var Event[]|Collection|array */
    protected $events;

    public function __construct(Collection $events)
    {
        $this->events = $events;
    }

    public function filterEvents(DateTime $date1, ?DateTime $date2 = null) : Collection
    {
        return $this->events->filter(function(Event $event) use ($date1, $date2) : bool {
            return $event->isMatching($date1);
        });
    }
}