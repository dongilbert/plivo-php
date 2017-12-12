<?php

namespace Treblig\Plivo\Response;

class AnsweredCall
{
    /**
     * @var string
     */
    protected $direction;

    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $aLegUuid;

    /**
     * @var string
     */
    protected $billRate;

    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $callUuid;

    /**
     * @var string
     */
    protected $aLegRequestUuid;

    /**
     * @var string
     */
    protected $requestUuid;

    /**
     * @var string
     */
    protected $callStatus;

    /**
     * @var string
     */
    protected $event;

    /**
     * AnsweredCall constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->direction = $data['Direction'] ?? '';
        $this->from = $data['From'] ?? '';
        $this->aLegUuid = $data['ALegUUID'] ?? '';
        $this->billRate = $data['BillRate'] ?? '';
        $this->to = $data['To'] ?? '';
        $this->callUuid = $data['CallUUID'] ?? '';
        $this->aLegRequestUuid = $data['ALegRequestUUID'] ?? '';
        $this->requestUuid = $data['RequestUUID'] ?? '';
        $this->callStatus = $data['CallStatus'] ?? '';
        $this->event = $data['Event'] ?? '';
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getALegUuid(): string
    {
        return $this->aLegUuid;
    }

    /**
     * @return string
     */
    public function getBillRate(): string
    {
        return $this->billRate;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getCallUuid(): string
    {
        return $this->callUuid;
    }

    /**
     * @return string
     */
    public function getALegRequestUuid(): string
    {
        return $this->aLegRequestUuid;
    }

    /**
     * @return string
     */
    public function getRequestUuid(): string
    {
        return $this->requestUuid;
    }

    /**
     * @return string
     */
    public function getCallStatus(): string
    {
        return $this->callStatus;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }


}