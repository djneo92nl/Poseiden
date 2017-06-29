<?php

namespace App\Utility\Devices\Poseiden\DeviceDriver;

use App\Utility\Devices\Api;
use App\Utility\Devices\State;
use Yeelight\Bulb\Bulb;
use Yeelight\YeelightClient;


class YeeColorLight implements Api\ColorLight
{
	/**
	 * @var Bulb
	 */
	private $device;

	/**
	 * @var YeelightClient
	 */
	public $client;


	/**
	 * @var State\ColorState
	 */
	protected $state;

	public function __construct($deviceControllerManager, $data)
	{
		$this->client = new YeelightClient();
		$this->state = new State\ColorState();

		$this->device = $this->client->search()[ $data->yeeLightid];


		while (empty($this->device)) {
			usleep(10);
			$this->device = $this->client->search()[ $data->yeeLightid];

		}
		$this->createState();

	}

	public function setState(State\ColorState $state)
	{
		// TODO: Implement setState() method.
	}

	public function createState ()
	{
		$this->device->getProp([
			\Yeelight\Bulb\BulbProperties::POWER,
			\Yeelight\Bulb\BulbProperties::BRIGHT,
			\Yeelight\Bulb\BulbProperties::RGB,
		])->done(function(\Yeelight\Bulb\Response $response){
			if ($response->getResult()[0] === 'on') {
				$this->state->setState(true);
			} else {
				$this->state->setState(false);
			}
			$this->state->setValue($this->map($response->getResult()[1], 0, 100, 0, 255));
			$this->state->setColor('#'. dechex($response->getResult()[2]));
		});
	}


	public function getState()
	{
		return $this->state;
	}

	public function setOff()
	{
		$this->device->setPower('off', Bulb::EFFECT_SMOOTH, 500);
	}

	public function setOn()
	{
		$this->device->setPower('on', Bulb::EFFECT_SMOOTH, 500);
	}

	public function map($value, $low1, $high1, $low2, $high2) {
		return ($value / ($high1 - $low1)) * ($high2 - $low2) + $low2;
	}
	public function setBrightness($brightness)
	{
		if ($brightness > 256) {
			$brightness = 256;
		}

		$this->device->setBright($this->map($brightness, 0, 256, 0, 100), Bulb::EFFECT_SMOOTH, 500);

		$this->createState();
		return $this->getState();
	}

	public function getBrightness()
	{
		$this->createState();
		return $this->state->getValue();
	}

	public function getColor()
	{
		$this->createState();
		return $this->state->getColor();
	}

	public function setColor($color)
	{
		$this->device->setRgb(hexdec($color), Bulb::EFFECT_SMOOTH, 500 );
	}

}