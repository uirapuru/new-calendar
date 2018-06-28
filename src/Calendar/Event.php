<?php

namespace Calendar;


use Calendar\Expression\ExpressionInterface;
use DateTime;

class Event
{
    /** @var ExpressionInterface */
    protected $date;

    public function __construct(ExpressionInterface $date)
    {
        $this->date = $date;
    }

    public function isMatching(DateTime $date) : bool
    {
        return $this->date->isMatching($date);
    }
}