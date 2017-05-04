<?php

namespace App\Utility\Devices\PhilipsHue\DeviceConnector;

use App\Utility\Devices\Api;
use Phue;

/**
 * Class BridgeConnector
 * @package App\Utility\Devices\PhilipsHue\DeviceConnector
 * @author  Remco Janse <remko@djneo.nl>
 */
class BridgeConnector implements Api\DeviceControllerInterface
{

    /**
     * User ID as saved in hue bridge
     *
     * @var
     */
    private $hueUserId;

    /**
     * Bridge ip
     *
     * @var
     */
    private $hueBridgeIp;

    /**
     * @var \Phue\Client;
     */
    private $connecter;


    public function installController()
    {
        // TODO: Implement installController() method.
    }

    public function initialiseController($data)
    {
        if (!empty($data)) {
            $this->hueUserId = $data->hueUserId;
            $this->hueBridgeIp = $data->hueBridgeIp;

            $this->connecter = new Phue\Client($this->hueBridgeIp, $this->hueUserId);
        }
    }

    public function autoDiscover()
    {
        $lights = $this->connecter->getLights();

        $return = [];
        foreach ($lights as $light) {
            /** @var $light Phue\LightInterface */
            $return[] = ['systemID' => $light->getId(), 'type' => $light->getType(), 'name' => $light->getName()];
        }

        return $return;
    }
    
    /**
     * @param int $deviceId
     * @return Phue\Light
     */
    public function returnDevice($deviceId)
    {
        return $this->connecter->getLights()[$deviceId];
    }
}