<?php

namespace Treblig\Plivo\Laravel\Events;

use Treblig\Plivo\Request\Call;

class RecordingReceived
{
    /**
     * @var Call
     */
    private $call;

    /**
     * RecordingReceived constructor.
     *
     * @param Call $call
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