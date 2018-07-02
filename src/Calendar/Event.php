<?php

namespace Calendar;


use Calendar\Event\TimeSpan;
use Calendar\Expression\ExpressionInterface;
use DateTime;
use Ramsey\Uuid\UuidInterface;

class Event
{
    /** @var UuidInterface */
    protected $id;

    /** @var ExpressionInterface */
    protected $expression;

    /** @var TimeSpan */
    protected $time;

    public function __construct(ExpressionInterface $expression, TimeSpan $time)
    {
        $this->expression = $expression;
        $this->time = $time;
    }

    public function isMatching(DateTime $date) : bool
    {
        return $this->expression->isMatching($date);
    }

    public function duration() : int
    {
        return $this->time->minutes();
    }
}