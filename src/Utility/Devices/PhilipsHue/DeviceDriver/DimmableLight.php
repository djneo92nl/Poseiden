<?php

namespace App\Utility\Devices\PhilipsHue\DeviceDriver;

use App\Utility\Devices\Api;
use App\Utility\Devices\State;

/**
 * Class DimmableLight
 * @package App\Utility\Devices\PhilipsHue\DeviceDriver
 */
class DimmableLight extends Common implements Api\DimmableDevice
{

	/**
	 * @var State\DimmableState
	 */
	protected $state;

	public function __construct ($deviceControllerManager, $data)
	{
		parent::__construct($deviceControllerManager, $data);
		$this->getDeviceFromHue($data->hueId);
		$this->state = new State\DimmableState();
		$this->createState();
	}

	/**
	 *
	 */
	public function createState ()
	{

		$this->state->setState(($this->device->isOn() ? 1 : 0));
		$this->state->setValue($this->device->getBrightness());
	}

	/**
	 *
	 */
	public function getState ()
	{
		$this->createState();
		return $this->state;
	}

	/**
	 *
	 */
	public function setState (State\DimmableState $state)
	{
		return $this->state;
	}

	/**
	 * Turns Device Off
	 */
	public function setOff ()
	{
		$this->device->setOn(false);
	}

	/**
	 * Turns Device On
	 */
	public function setOn ()
	{
		$this->device->setOn(true);
	}

	/**
	 *
	 */
	public function setBrightness ($brightness)
	{
		$brightness = (int) $brightness;
		$this->device->setBrightness($brightness);

		return  $this->getBrightness();
	}

	/**
	 *
	 */
	public function getBrightness ()
	{
		return $this->device->getBrightness();
	}
}

