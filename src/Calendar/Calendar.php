<?php

namespace Calendar;

use DateInterval;
use DatePeriod;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\UuidInterface;

class Calendar
{
    /** @var UuidInterface */
    protected $id;

    /** @var Event[]|Collection|array */
    protected $events;

    public function __construct(UuidInterface $id, ?Collection $events = null)
    {
        $this->id = $id;
        $this->events = $events ?? new ArrayCollection();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function filterEvents(DateTime $date) : Collection
    {
        return $this->events->filter(function(Event $event) use ($date) : bool {
            return $event->isMatching($date);
        });
    }

    public function getOccurrences(DateTime $start, DateTime $end) : Collection
    {
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);

        $result = new ArrayCollection();

        foreach($period as $day) {
            foreach($this->events as $event) {
                if($event->isMatching($day)) {
                    $result->add(new Occurrence($day, $event));
                }
            }
        }

        return $result;
    }

    public function addEvent(Event $event) : void
    {
        $this->events->add($event);
    }
}