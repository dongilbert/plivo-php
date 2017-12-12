<?php

namespace Treblig\Plivo;

use Plivo\RestAPI;
use Treblig\Plivo\Exceptions\InvalidMethodException;
use Treblig\Plivo\Response\AnsweredCall;
use Treblig\Plivo\Response\Call;
use Treblig\Plivo\Response\Factory as ResponseFactory;
use Treblig\Plivo\Laravel\Events\CallInitiated;

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
     */
    public function call(array $args): Call
    {
        return $this->request('make_call', $args);
    }

    /**
     * @param $data JSON string of the call data from Plivo
     */
    public function handleCallAnswer($data): AnsweredCall
    {
        return ResponseFactory::make('answered_call', $data);
    }

    /**
     * @param       $plivoMethod
     * @param array $args
     *
     * @return object
     *
     * @throws InvalidMethodException
     */
    private function request($plivoMethod, array $args)
    {
        if (!method_exists($this->plivoApi, $plivoMethod)) {
            throw new InvalidMethodException($plivoMethod);
        }

        $response = $this->plivoApi->{$plivoMethod}($args);

        return ResponseFactory::make($plivoMethod, $response['response']);
    }
}