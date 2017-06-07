<?php

namespace App\Utility\Devices;

use App\Model\Entity\DeviceController;
use App\Utility\Devices\Api;
use Cake\ORM\TableRegistry;

use Cake\Core\Configure;

class DeviceManager
{


	private $deviceDriver;

	/**
	 * @var array
	 */
	private $deviceDriverConfiguration;

	private $deviceControllerManager;

	/**
	 * DeviceManager constructor.
	 * @param $deviceDriver
	 * @param $deviceController
	 */
	public function __construct ($id ,$data, $devicesControllerTable = null)
	{
		$this->createDeviceControllerManager($devicesControllerTable);

		$this->createDevice($data->DeviceConfig->class, $data->data, $id);

	}

	public function createDeviceControllerManager($devicesControllerTable)
	{
		if (empty($devicesControllerTable)) {
			$devicesControllerTable = TableRegistry::get('DeviceControllers');
		}

		$this->deviceControllerManager = new DeviceControllerManager(
			$devicesControllerTable->device_controller_type,
			json_decode($devicesControllerTable->device_controller_data),
			$devicesControllerTable->id
		);
	}

	/**
	 * @param $deviceDriverId
	 * @return array
	 */
	static public function getDeviceConfiguration ($deviceDriverId)
	{
		$poseidenInstalledDevices = Configure::read("Poseiden.devices");
		$poseidenInstalledDevicesNames = array_keys($poseidenInstalledDevices);

		return $poseidenInstalledDevices[$deviceDriverId];
	}

	public function createDevice($class, $data, $id)
	{
		$device =  new $class($this->deviceControllerManager, $data);
		$this->deviceDriver = $device;
	}

	public function runDeviceCommand($command, $data = null)
	{
		try {
			return $this->deviceDriver->$command($data);
		} catch (\Exception $exception){
			return false;
		}

	}
}