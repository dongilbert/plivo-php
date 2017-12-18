<?php

namespace Treblig\Plivo\Request;

class Call
{
    /**
     * @var string
     */
    protected $digits;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var string
     */
    protected $recordUrl;

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
    protected $recordingId;

    /**
     * @var string
     */
    protected $recordFile;

    /**
     * @var string
     */
    protected $recordingEndMs;

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
    protected $recordingDurationMs;

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
     * @var string
     */
    protected $recordingDuration;

    /**
     * @var string
     */
    protected $recordingStartMs;

    /**
     * @var int
     */
    protected $entityId;

    /**
     * AnsweredCall constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->digits = $data['Digits'] ?? '';
        $this->direction = $data['Direction'] ?? '';
        $this->recordUrl = $data['RecordUrl'] ?? '';
        $this->from = $data['From'] ?? '';
        $this->aLegUuid = $data['ALegUUID'] ?? '';
        $this->recordingId = $data['RecordingID'] ?? '';
        $this->recordFile = $data['RecordFile'] ?? '';
        $this->recordingEndMs = $data['RecordingEndMs'] ?? '';
        $this->billRate = $data['BillRate'] ?? '';
        $this->to = $data['To'] ?? '';
        $this->callUuid = $data['CallUUID'] ?? '';
        $this->aLegRequestUuid = $data['ALegRequestUUID'] ?? '';
        $this->requestUuid = $data['RequestUUID'] ?? '';
        $this->callStatus = $data['CallStatus'] ?? '';
        $this->event = $data['Event'] ?? '';
        $this->recordingDuration = $data['RecordingDuration'] ?? '';
        $this->recordingDurationMs = $data['RecordingDurationMs'] ?? '';
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'digits' => $this->digits,
            'direction' => $this->direction,
            'recordUrl' => $this->recordUrl,
            'from' => $this->from,
            'aLegUuid' => $this->aLegUuid,
            'recordingId' => $this->recordingId,
            'recordFile' => $this->recordFile,
            'recordingEndMs' => $this->recordingEndMs,
            'billRate' => $this->billRate,
            'to' => $this->to,
            'callUuid' => $this->callUuid,
            'aLegRequestUuid' => $this->aLegRequestUuid,
            'requestUuid' => $this->requestUuid,
            'callStatus' => $this->callStatus,
            'event' => $this->event,
            'recordingDuration' => $this->recordingDuration,
            'recordingDurationMs' => $this->recordingDurationMs,
        ];
    }

    /**
     * @param integer $id
     */
    public function setEntityId(int $id)
    {
        $this->entityId = $id;
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entityId;
    }

    /**
     * @return string
     */
    public function getDigits(): string
    {
        return $this->digits;
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
    public function getRecordUrl(): string
    {
        return $this->recordUrl;
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
    public function getRecordingId(): string
    {
        return $this->recordingId;
    }

    /**
     * @return string
     */
    public function getRecordFile(): string
    {
        return $this->recordFile;
    }

    /**
     * @return string
     */
    public function getRecordingEndMs(): string
    {
        return $this->recordingEndMs;
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
    public function getRecordingDurationMs(): string
    {
        return $this->recordingDurationMs;
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

    /**
     * @return string
     */
    public function getRecordingDuration(): string
    {
        return $this->recordingDuration;
    }

    /**
     * @return string
     */
    public function getRecordingStartMs(): string
    {
        return $this->recordingStartMs;
    }
}