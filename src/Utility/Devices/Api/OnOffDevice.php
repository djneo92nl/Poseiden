<?php

namespace App\Utility\Devices\Api;

use App\Utility\Devices\State;

/**
 * Interface DimmableDevice
 * @package App\Utility\Devices\Api
 */
interface OnOffDevice
{
	public function __construct($deviceControllerManager, $data);

	/**
	 * @return mixed
	 */
	public function setState (State\OnOffState $state);

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
     * @return bool
     */
    public function isAvailable();
}

