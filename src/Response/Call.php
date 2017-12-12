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

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getRequestUuid(): string
    {
        return $this->request_uuid;
    }

    public function getApiId(): string
    {
        return $this->api_id;
    }

    public function didFire(): bool
    {
        return $this->getMessage() === static::FIRED;
    }
}