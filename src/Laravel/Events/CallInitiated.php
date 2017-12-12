<?php

namespace Treblig\Plivo\Laravel\Events;

use Treblig\Plivo\Response\Call;

class CallInitiated
{
    /**
     * @var Call
     */
    private $call;

    /**
     * @var array
     */
    private $callArgs;

    /**
     * CallInitiated constructor.
     *
     * @param Call  $call
     * @param array $callArgs
     */
    public function __construct(Call $call, array $callArgs)
    {
        $this->call = $call;
        $this->callArgs = $callArgs;
    }

    /**
     * @return Call
     */
    public function getCall()
    {
        return $this->call;
    }

    /**
     * @return array
     */
    public function getCallArgs()
    {
        return $this->callArgs;
    }
}