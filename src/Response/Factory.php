<?php

namespace Treblig\Plivo\Response;

use Treblig\Plivo\Exceptions\InvalidTypeException;

class Factory
{
    private static $map = [
        'make_call' => Call::class,
        'answered_call' => AnsweredCall::class,
        'recording' => Recording::class,
    ];

    /**
     * @param $type
     * @param $data
     *
     * @return mixed
     * @throws InvalidTypeException
     */
    public static function make($type, $data)
    {
        if (!array_key_exists($type, static::$map)) {
            throw new InvalidTypeException($type);
        }

        $responseClass = static::$map[$type];

        if (!is_array($data)) {
            $data = json_decode($data, true);
        }

        return new $responseClass($data);
    }
}