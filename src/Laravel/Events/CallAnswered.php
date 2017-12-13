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
     * @var string
     */
    private $responseXml;

    /**
     * CallAnswered constructor.
     *
     * @param AnsweredCall $call
     */
    public function __construct(AnsweredCall $call)
    {
        $this->call = $call;
    }

    /**
     * @return AnsweredCall
     */
    public function getCall(): AnsweredCall
    {
        return $this->call;
    }

    /**
     * @param string $xml
     */
    public function setResponseXml($xml)
    {
        $this->responseXml = $xml;
    }

    /**
     * @return string
     */
    public function getResponseXml(): string
    {
        return $this->responseXml;
    }
}