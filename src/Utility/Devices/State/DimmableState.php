<?php
namespace App\Utility\Devices\State;

class DimmableState extends OnOffState
{
	const EMPTY_VALUE = 0;

	public $brightness;

	/**
	 * @return integer
	 */
	public function getValue ()
	{
		return $this->brightness;
	}

	/**
	 * @param integer $value
	 */
	public function setValue (int $brightness)
	{
		$this->brightness = $brightness;
	}

	public function incrementValue ()
	{

	}

	public function __construct ($state = self::OFF, $brightness = self::EMPTY_VALUE)
	{
		$this->brightness = $brightness;

		parent::__construct($state);
	}

}