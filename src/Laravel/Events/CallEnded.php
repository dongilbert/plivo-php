<?php

namespace Treblig\Plivo\Laravel\Events;

use Treblig\Plivo\Request\Call;

class CallEnded
{
    /**
     * @var Call
     */
    private $call;

    /**
     * CallEnded constructor.
     *
     * @param Call  $call
     */
    public function __construct(Call $call)
    {
        $this->call = $call;
    }

    /**
     * @return Call
     */
    public function getCall(): Call
    {
        return $this->call;
    }
}