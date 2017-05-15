<?php
namespace App\Utility\Devices\Poseiden\DeviceConnector;

use Yeelight\YeelightClient;
use App\Utility\Devices\Api;

class YeeLightConnector implements Api\DeviceControllerInterface {


	/**
	 * @var YeelightClient
	 */
	public $client;

	public $devices;

	public function installController ()
	{
		// TODO: Implement installController() method.
	}

	public function autoDiscover ()
	{
		// TODO: Implement installController() method.
	}

	public function initialiseController ($data)
	{
		$this->client = new YeelightClient();
		$this->devices = $this->client->search();
	}

	public function returnDevice($id)
	{
		return $this->devices[$id];
	}



}