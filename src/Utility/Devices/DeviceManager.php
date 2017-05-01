<?php

namespace App\Utility\Devices;

use App\Utility\Devices\Api;

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
    public function __construct($deviceDriverId, $deviceControllerName)
    {

        $this->deviceDriverConfiguration = $this::getDeviceConfiguration($deviceDriverId);
    }

    /**
     * @param $deviceDriverId
     * @return array
     */
    static public function getDeviceConfiguration($deviceDriverId)
    {
        $poseidenInstalledDevices = Configure::read("Poseiden.devices");
        $poseidenInstalledDevicesNames = array_keys($poseidenInstalledDevices);

        return $poseidenInstalledDevices[$poseidenInstalledDevicesNames[$deviceDriverId]];
    }

    public function runDeviceCommand($command, $data = null)
    {
        try {
        }
        catch (\Exception $exception){}

    }
}