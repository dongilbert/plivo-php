<?php

namespace Treblig\Plivo;

use Plivo\RestAPI;

class Plivo
{
    /**
     * @var RestAPI
     */
    protected $plivoApi;

    /**
     * Plivo constructor.
     *
     * @param string $authId
     * @param string $authToken
     */
    public function __construct($authId, $authToken)
    {
        $this->plivoApi = new RestAPI($authId, $authToken);
    }

    public function call($sender, $recipient, $answerUrl)
    {
        $this->plivoApi->make_call([
            'from' => $sender,
            'to' => $recipient,
            'answer_url' => $answerUrl,
        ]);
    }
}