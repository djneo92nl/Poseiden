<?php

namespace App\Utility\Devices\Api;

/**
 * Interface DimmableDevice
 * @package App\Utility\Devices\Api
 */
interface DimmableDevice
{
	/**
	 * @return mixed
	 */
	public function setState ();

	/**
	 * @return mixed
	 */
	public function getState ();

	/**
	 * @return mixed
	 */
	public function setOff ();

	/**
	 * @return mixed
	 */
	public function setOn ();

	/**
	 * @return mixed
	 */
	public function setBrightness ();

	/**
	 * @return mixed
	 */
	public function getBrightness ();
}

