<?php

namespace Treblig\Plivo\Response;

class Recording
{
    /**
     * @var string
     */
    private $recordUrl;

    /**
     * @var string
     */
    private $recordingDuration;

    /**
     * @var string
     */
    private $recordingDurationMs;

    /**
     * @var string
     */
    private $recordingStartMs;

    /**
     * @var string
     */
    private $recordingEndMs;

    /**
     * @var string
     */
    private $recordingId;

    /**
     * @var string
     */
    private $callUuid;

    /**
     * @var integer
     */
    private $entityId;

    /**
     * Recording constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->recordUrl = $data['RecordUrl'] ?? '';
        $this->recordingDuration = $data['RecordingDuration'] ?? '';
        $this->recordingDurationMs = $data['RecordingDurationMs'] ?? '';
        $this->recordingStartMs = $data['RecordingStartMs'] ?? '';
        $this->recordingEndMs = $data['RecordingEndMs'] ?? '';
        $this->recordingId = $data['RecordingId'] ?? '';
        $this->callUuid = $data['CallUUID'] ?? '';
    }

    public function toArray()
    {
        return [
            'recordUrl' => $this->recordUrl,
            'recordingDuration' => $this->recordingDuration,
            'recordingDurationMs' => $this->recordingDurationMs,
            'recordingStartMs' => $this->recordingStartMs,
            'recordingEndMs' => $this->recordingEndMs,
            'recordingId' => $this->recordingId,
        ];
    }

    /**
     * @param integer $id
     */
    public function setEntityId($id)
    {
        $this->entityId = $id;
    }

    /**
     * @return integer
     */
    public function getEntityId(): int
    {
        return $this->entityId;
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
    public function getRecordUrl(): string
    {
        return $this->recordUrl;
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
    public function getRecordingDurationMs(): string
    {
        return $this->recordingDurationMs;
    }

    /**
     * @return string
     */
    public function getRecordingStartMs(): string
    {
        return $this->recordingStartMs;
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
    public function getRecordingId(): string
    {
        return $this->recordingId;
    }
}