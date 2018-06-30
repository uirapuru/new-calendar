<?php

namespace Test\Unit\Calendar\Event;

use Calendar\Event\Time;
use Calendar\Event\TimeSpan;
use PHPUnit\Framework\TestCase;

class TimeSpanTest extends TestCase
{
    public function testDuration()
    {
        $timeSpan = new TimeSpan(Time::str("11:00"), Time::str("12:00"));

        $this->assertEquals(60, $timeSpan->minutes());

        $timeSpan = new TimeSpan(Time::str("11:00"), Time::str("12:35"));

        $this->assertEquals(95, $timeSpan->minutes());
    }

    public function testValidation()
    {
        $this->expectExceptionMessage("End hour can't be grater than starting hour!");

        $timeSpan = new TimeSpan(Time::str("12:00"), Time::str("11:00"));
    }

    public function testToString()
    {
        $timeSpan = new TimeSpan(Time::str("11:00"), Time::str("12:00"));

        $this->assertEquals("11:00-12:00", (string) $timeSpan);
    }
}
