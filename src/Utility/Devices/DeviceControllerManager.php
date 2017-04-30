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
    public function getDeviceControllerConfiguration($deviceControllerId)
    {
        $poseidenInstalledDevicesControllers = Configure::read("Poseiden.deviceConnector");
        $poseidenInstalledDevicesControllersNames = array_keys($poseidenInstalledDevicesControllers);

        return $poseidenInstalledDevicesControllers[$poseidenInstalledDevicesControllersNames[$deviceControllerId]];
    }

}