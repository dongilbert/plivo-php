<?php

namespace Treblig\Plivo\Response;

class Call
{
    const FIRED = 'call fired';

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $request_uuid;

    /**
     * @var string
     */
    protected $api_id;

    /**
     * @var int
     */
    protected $entityId;

    /**
     * Call constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->message = $data['message'] ?? '';
        $this->request_uuid = $data['request_uuid'] ?? '';
        $this->api_id = $data['api_id'] ?? '';
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'message' => $this->message,
            'request_uuid' => $this->request_uuid,
            'api_id' => $this->api_id,
        ];
    }

    /**
     * @return bool
     */
    public function didFire(): bool
    {
        return $this->getMessage() === static::FIRED;
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
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getRequestUuid(): string
    {
        return $this->request_uuid;
    }

    /**
     * @return string
     */
    public function getApiId(): string
    {
        return $this->api_id;
    }
}