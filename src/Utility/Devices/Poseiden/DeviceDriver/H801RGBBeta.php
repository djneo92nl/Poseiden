<?php

namespace App\Utility\Devices\Poseiden\DeviceDriver;

use App\Utility\Devices\Api\ColorLight;
use App\Utility\Devices\State\ColorState;
use App\Utility\Devices;

class H801RGBBeta implements ColorLight
{
	/**
	 * @var Devices\DeviceControllerManager
	 */
	protected $deviceControllerManager;

	/** @var  The Hashed Topic  (md5) */
	protected $topicHash;

	protected $data;

	public function __construct($deviceControllerManager, $data)
	{
		$this->deviceControllerManager = $deviceControllerManager;

		$this->data = $data;
		$this->topicHash = md5($data->topic);
	}

	public function setState(ColorState $state)
	{
		// TODO: Implement setState() method.
	}


	public function getState()
	{
		$state = new ColorState();
		if ($data = \Cake\Cache\Cache::read($this->topicHash.'color') === false) {
			$state->setColor('000000');
			$state->setState(false);
		}
		else {
			$state->setColor('#' . \Cake\Cache\Cache::read($this->topicHash.'color'));
			$state->setState(true);
		}


		return $state;
	}

	public function setOff()
	{
		$this->deviceControllerManager->runControllerCommand('sendMessage',['topic' => $this->data->topic,'message' => '000000', 'qos' => 1]);
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

	public function setColor($color)
	{
		//send to topic
		$this->deviceControllerManager->runControllerCommand('sendMessage',['topic' => $this->data->topic,'message' => $color, 'qos' => 1]);
		\Cake\Cache\Cache::write($this->topicHash.'color', $color);

		// TODO: Implement setColor() method.
	}

	public function getColor()
	{
		// TODO: Implement getColor() method.
	}

}