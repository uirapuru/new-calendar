<?php

namespace Calendar\Event;

use Exception;

class TimeSpan
{
    /** @var Time */
    protected $from;

    /** @var Time */
    protected $to;

    /**
     * @throws Exception
     */
    public function __construct(Time $from, Time $to)
    {
        if($from->gt($to)) {
            throw new Exception("End hour can't be grater than starting hour!");
        }

        $this->from = $from;
        $this->to = $to;
    }

    public function minutes() : int
    {
        $diff = $this->to->toDateTime()->diff(
            $this->from->toDateTime()
        );

        $result = 0;

        if($diff->h > 0) {
            $result = $diff->h * 60;
        }

        return $result += $diff->i;
    }

    public function __toString() : string
    {
        return sprintf("%s-%s", $this->from, $this->to);
    }
}