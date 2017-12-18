<?php

namespace Treblig\Plivo\Laravel\Events;

use Treblig\Plivo\Request\Call;

class CallAnswered
{
    /**
     * @var Call
     */
    private $call;

    /**
     * @var string
     */
    private $responseXml;

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