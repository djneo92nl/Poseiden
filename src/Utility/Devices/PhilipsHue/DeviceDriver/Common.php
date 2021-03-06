<?php

namespace App\Utility\Devices\PhilipsHue\DeviceDriver;

use App\Utility\Devices\Api;
use App\Utility\Devices\DeviceControllerManager;
use App\Utility\Devices\State;
use App\Utility\Devices\PhilipsHue\DeviceConnector;
use Phue;

/**
 * Class DimmableLight
 * @package App\Utility\Devices\PhilipsHue\DeviceDriver
 */
class Common {

	/**
	 * @var Phue\Light
	 */
	public $device;

	/**
	 * @var DeviceControllerManager
	 */
	public $deviceControllerManager;

	public function __construct($deviceControllerManager, $data)
	{
		if (!empty($deviceControllerManager)) {
			$this->deviceControllerManager = $deviceControllerManager;
		}

	}

    /**
     * @param $id
     */
	public function getDeviceFromHue($id)
	{
		$this->device = $this->deviceControllerManager->runControllerCommand('returnDevice', $id);
	}

	public function map($value, $low1, $high1, $low2, $high2) {
		return ($value / ($high1 - $low1)) * ($high2 - $low2) + $low2;
	}
}

