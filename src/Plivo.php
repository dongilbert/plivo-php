<?php

namespace Treblig\Plivo;

use Plivo\RestAPI;
use Treblig\Plivo\Exceptions\InvalidMethodException;
use Treblig\Plivo\Exceptions\InvalidTypeException;
use Treblig\Plivo\Response\AnsweredCall;
use Treblig\Plivo\Response\Call;
use Treblig\Plivo\Response\Factory as ResponseFactory;
use Treblig\Plivo\Response\Recording;

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

    /**
     * @param array $args
     *
     * @return Call
     *
     * @throws InvalidMethodException
     * @throws InvalidTypeException
     */
    public function call(array $args): Call
    {
        $response = $this->plivoApi->make_call($args);

        return ResponseFactory::make(Call::class, $response['response']);
    }
}