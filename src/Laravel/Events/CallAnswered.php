<?php

namespace Treblig\Plivo\Laravel\Events;

use Treblig\Plivo\Response\AnsweredCall;

class CallAnswered
{
    /**
     * @var AnsweredCall
     */
    private $call;

    /**
     * @var null|integer
     */
    private $forwardToNumber;

    /**
     * @var string
     */
    private $responseXml;

    /**
     * CallAnswered constructor.
     *
     * @param AnsweredCall $call
     */
    public function __construct(AnsweredCall $call, $forwardToNumber = null)
    {
        $this->call = $call;
        $this->forwardToNumber = $forwardToNumber;
    }

    public function getCall(): AnsweredCall
    {
        return $this->call;
    }

    public function getForwardToNumber(): string
    {
        return $this->forwardToNumber;
    }

    public function setResponseXml($xml)
    {
        $this->responseXml = $xml;
    }

    public function getResponseXml(): string
    {
        return $this->responseXml;
    }
}