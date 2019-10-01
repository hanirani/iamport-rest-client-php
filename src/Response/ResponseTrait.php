<?php

namespace Iamport\RestClient\Response;

trait ResponseTrait
{
    /**
     * @param $name
     *
     * @return mixed|null
     */
    public function __get($name)
    {
        $getter = 'get'.str_replace('_', '', ucwords($name, '_'));
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
    }

    public function timestampToDate(int $timestamp, string $format = null)
    {
        $format = $format ?? 'Y-m-d H:i:s';

        return ($timestamp === 0) ? 0 : date($format, $timestamp);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
