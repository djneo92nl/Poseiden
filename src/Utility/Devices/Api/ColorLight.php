<?php

namespace App\Utility\Devices\Api;

use App\Utility\Devices\State;

/**
 * Interface ColorLight
 * @package App\Utility\Devices\Api
 */
interface ColorLight
{
	public function __construct($deviceControllerManager, $data);

	/**
	 * @return mixed
	 */
	public function setState (State\ColorState $state);

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
	public function setBrightness ($brightness);

	/**
	 * @return mixed
	 */
	public function getBrightness ();

	/**
	 * @return mixed
	 */
	public function setColor($color);
	/**
	 * @return mixed
	 */
	public function getColor();

}

