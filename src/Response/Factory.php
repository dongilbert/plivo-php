<?php

namespace Treblig\Plivo\Response;

use Treblig\Plivo\Exceptions\InvalidTypeException;

class Factory
{
    /**
     * @param $responseClass
     * @param $data
     *
     * @return mixed
     */
    public static function make($responseClass, $data)
    {
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }

        return new $responseClass($data);
    }
}