<?php

namespace App\Utility\Devices;

use Aura\Intl\Exception;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
;

class DeviceControllerManager
{
    /**
     * @var array
     */
    public $deviceControllerConfiguration;

    /**
     * @var Api\DeviceControllerInterface
     */
    public $deviceController;

    /**
     * @var
     */
    public $deviceControllerId;

    /**
     * @param $deviceDriverId
     * @return array
     */
    public function getDeviceControllerConfiguration($deviceConfigControllerId)
    {
        $poseidenInstalledDevicesControllers = Configure::read("Poseiden.deviceConnector");
        $poseidenInstalledDevicesControllersNames = array_keys($poseidenInstalledDevicesControllers);

        return $poseidenInstalledDevicesControllers[$poseidenInstalledDevicesControllersNames[$deviceConfigControllerId]];
    }

    /**
     * DeviceControllerManager constructor.
     *
     * @param $deviceControllerId
     * @param $data
     */
    public function __construct($deviceConfigControllerId, $data, $controllerId)
    {
        $this->deviceControllerConfiguration = $this->getDeviceControllerConfiguration($deviceConfigControllerId);

        $this->deviceControllerId = $controllerId;

        try{
            $this->deviceController =  new $this->deviceControllerConfiguration['class'];
            //initialise the controller
            $this->deviceController->initialiseController($data);
        }catch (\Exception $exception) {
            die($exception->getMessage());
        }

    }

    /**
     * @return string
     */
    public function runAutoDiscovery()
    {
        if ($this->deviceControllerConfiguration['deviceDiscovery']) {
            $devices = $this->deviceController->autoDiscover();
            if ($devices === false) {
                return 'No Devices Found';
            }


            $devicesTable = TableRegistry::get('Devices');
            foreach ($devices as $device) {
                $deviceObject = $devicesTable->newEntity();
                $deviceObject->name = $device['name'];
                $deviceObject->device_type = $device['type'];
                $deviceObject->device_template = json_encode(['hueId' => $device['systemID']]);
                $deviceObject->device_controller_id = $this->deviceControllerId;

                $devicesTable->save($deviceObject);
            }


        }

    }



}