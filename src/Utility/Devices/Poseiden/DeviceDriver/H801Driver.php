<?php

namespace App\Utility\Devices\Poseiden\DeviceDriver;

use App\Utility\Devices\Api\ColorLight;
use App\Utility\Devices\State\ColorState;

class H801Driver implements ColorLight
{
	/**
	 * @var
	 */
	protected $deviceControllerManager;

	public function __construct($deviceControllerManager, $data)
	{
		$this->deviceControllerManager = $deviceControllerManager;
	}

	public function setState(ColorState $state)
	{
		// TODO: Implement setState() method.
	}

	public function getState()
	{
		// TODO: Implement getState() method.
	}

	public function setOff()
	{
		// TODO: Implement setOff() method.
	}

	public function setOn()
	{
		// TODO: Implement setOn() method.
	}

	public function setBrightness($brightness)
	{
		// TODO: Implement setBrightness() method.
	}

	public function getBrightness()
	{
		// TODO: Implement getBrightness() method.
	}

	public function setColor()
	{
		// TODO: Implement setColor() method.
	}

	public function getColor()
	{
		// TODO: Implement getColor() method.
	}

}