<?php
namespace App\Utility\Devices\State;

class OnOffState
{
	/**
	 * Device On State
	 */
	const ON = true;

	/**
	 * Device Off State
	 */
	const OFF = false;


	/**
	 * @var int
	 */
	public $state;

	/**
	 * DimmableState constructor.
	 *
	 * @param int $state
	 */
	public function __construct ($state = self::OFF)
	{
		$this->state = $state;
	}


	/**
	 * Set State on
	 */
	public function setOn ()
	{
		$this->state = self::ON;
	}

	/**
	 * Set State off
	 */
	public function setOff ()
	{
		$this->state = self::OFF;
	}

	/**
	 * @return int
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * @param $state
	 * @return bool
	 */
	public function setState(bool $state)
	{
		$this->state = $state;
	}

	/**
	 * Toggle state
	 */
	public function toggle()
	{
		$this->state  = !$this->state;
	}

}