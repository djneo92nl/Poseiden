<?php

namespace App\Utility\Devices\PhilipsHue\DeviceDriver;

use App\Utility\Devices\Api;
use App\Utility\Devices\State;
use djneo\colorz;

/**
 * Class DimmableLight
 * @package App\Utility\Devices\PhilipsHue\DeviceDriver
 */
class ColorLight extends Common implements Api\ColorLight
{

	/**
	 * @var State\ColorState
	 */
	protected $state;

    /**
     * DimmableLight constructor.
     * @param $deviceControllerManager
     * @param $data
     */
	public function __construct ($deviceControllerManager, $data)
	{
		parent::__construct($deviceControllerManager, $data);
		$this->getDeviceFromHue($data->hueId);
		$this->state = new State\ColorState();
		$this->createState();
	}

	/**
	 *
	 */
	public function createState ()
	{
        if (!$this->device->isReachable()) {
            $this->state->setUnavailable();
        } else {
            $this->state->setState(($this->device->isOn() ? 1 : 0));

        }

		$this->state->setValue($this->device->getBrightness());
		substr($color = $this->getColor(),1);
		$this->state->setColor($color);
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
     * @param State\DimmableState $state
     * @return State\DimmableState
     */
	public function setState (State\ColorState $state)
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
     * @param $brightness
     * @return int|mixed
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

	public function setColor($color)
	{

		$this->state->setColor($color);
		$rgb = $this->state->hexToRgb($color);
		$hsl = $this->state->RgbToHsv($rgb['r'], $rgb['g'], $rgb['b']);

		$this->device->setHue((65535 / 360) * $hsl[0]);
		$this->device->setSaturation($this->map($hsl[1],0,100,0,255));
	}

	public function getColor()
	{
		$hueFromDevice = $this->map($this->device->getHue(),0, 65535,0 , 360);
		$satFromDevice = $this->map($this->device->getSaturation(),0, 254,0 , 100);
		$brightFromDevice = $this->map($this->getBrightness(),0, 254,0 , 99);
		$colorObject = new colorz(['type' => 'hsv', 'h' => $hueFromDevice, 's' =>$satFromDevice , 'v' => $brightFromDevice, 'a' => 1 ]);

		return $colorObject->getHex();
	}


}

