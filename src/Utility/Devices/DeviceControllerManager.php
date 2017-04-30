<?php

namespace App\Utility\Devices;

use Cake\Core\Configure;


class DeviceControllerManager
{
    /**
     * @var array
     */
    private $deviceDriverConfiguration;

    /**
     * @param $deviceDriverId
     * @return array
     */
    public function getDeviceControllerConfiguration($deviceDriverId)
    {
        $poseidenInstalledDevices = Configure::read("Poseiden.deviceConnector");
        $poseidenInstalledDevicesNames = array_keys($poseidenInstalledDevices);

        return $poseidenInstalledDevices[$poseidenInstalledDevicesNames[$deviceDriverId]];
    }

}