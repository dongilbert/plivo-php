<?php

namespace Treblig\Plivo\Request;

use Treblig\Plivo\Exceptions\InvalidTypeException;

class Factory
{
    /**
     * @param $requestClass
     * @param $data
     *
     * @return mixed
     */
    public static function make($requestClass, $data)
    {
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }

        return new $requestClass($data);
    }
}