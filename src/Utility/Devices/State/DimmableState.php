<?php

class DimmableState
{
	const EMPTY_VALUE = 0;

	protected $value;

	/**
	 * @return integer
	 */
	public function getValue ()
	{
		return $this->value;
	}

	/**
	 * @param integer $value
	 */
	public function setValue (int $value)
	{
		$this->value = $value;
	}

	public function incrementValue ($value)
	{

	}

	public function __construct ()
	{
		$value = self::EMPTY_VALUE;
	}

}