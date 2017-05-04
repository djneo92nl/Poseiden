<?php

class DimmableState
{
    const EMPTY_VALUE = 0;

    protected $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue(int $value)
    {
        $this->value = $value;
    }

    public function incrementValue($value)
    {

    }

    public function __construct()
    {
        $value = self::EMPTY_VALUE;
    }

}