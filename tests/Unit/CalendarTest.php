<?php

namespace Test\Unit;

use Calendar\Calendar;
use Calendar\Event;
use Calendar\Expression\DayOfWeek;
use Calendar\Expression\EveryDay;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{

    public function testFilterEvents()
    {
        $event1 = new Event(DayOfWeek::monday());
        $event2 = new Event(DayOfWeek::tuesday());
        $event3 = new Event(new EveryDay());

        $collection = new ArrayCollection([$event1, $event2, $event3]);

        $calendar = new Calendar($collection);

        $result = $calendar->filterEvents(new DateTime("last monday"));

        $this->assertCount(2, $result);
        $this->assertEquals($event1, $result[0]);
        $this->assertEquals($event3, $result[2]);
    }
}
