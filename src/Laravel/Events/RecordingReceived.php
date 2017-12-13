<?php

namespace Treblig\Plivo\Laravel\Events;

use Treblig\Plivo\Response\Recording;

class RecordingReceived
{
    /**
     * @var Recording
     */
    private $recording;

    /**
     * RecordingReceived constructor.
     *
     * @param Recording $recording
     */
    public function __construct(Recording $recording)
    {
        $this->recording = $recording;
    }

    /**
     * @return Recording
     */
    public function getRecording(): Recording
    {
        return $this->recording;
    }

}