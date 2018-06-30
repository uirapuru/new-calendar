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
    protected $date;

    /** @var TimeSpan */
    protected $time;

    public function __construct(ExpressionInterface $date)
    {
        $this->date = $date;
    }

    public function isMatching(DateTime $date) : bool
    {
        return $this->date->isMatching($date);
    }
}