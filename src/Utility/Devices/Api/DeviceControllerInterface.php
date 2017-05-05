<?php

namespace App\Utility\Devices\Api;

/**
 * Interface DeviceControllerInterface
 * @package App\Utility\Devices\Api
 * @author  Remco Janse remko@djneo.nl
 */
interface DeviceControllerInterface
{

	/**
	 * @return mixed
	 */
	public function installController();
	/**
	 * @return mixed
	 */
	public function autoDiscover();

	/**
	 * @return mixed
	 */
	public function initialiseController($data);
}